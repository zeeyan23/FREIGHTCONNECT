<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForwardingMemberRequest;
use App\Models\ForwardingMemberAccount;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Mail\ForwardingApplicationSubmitted;
use Illuminate\Support\Facades\Mail;

class ForwardingMemberController extends Controller
{
    public function store(StoreForwardingMemberRequest $request)
    {
        $validated = $request->validated();

        $validated['verification_documents'] = [];

        foreach ($request->file('verification_documents', []) as $document) {
            $validated['verification_documents'][] = $document->store(
                'forwarding-members/verification-documents',
                'local'
            );
        }

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request
                ->file('company_logo')
                ->store('forwarding-logos', 'local');
        }

        $validated['business_activity_document'] = $request
            ->file('business_activity_document')
            ->store('forwarding-documents/business-activity', 'local');

        // Save the application first.
        $application = ForwardingMemberAccount::create($validated);

        // Send confirmation email using Laravel Mail.
        try {
            Mail::to($application->business_email)->send(
                new ForwardingApplicationSubmitted($application)
            );
        } catch (Throwable $e) {
            Log::error('Forwarding application email failed.', [
                'application_id' => $application->id,
                'error' => $e->getMessage(),
            ]);
        }

        // Sync to the separate Google Sheets worksheet.
        try {
            $client = new Client();

            $client->setApplicationName(
                'FreightConnect Forwarding Members'
            );

            $client->setScopes([
                Sheets::SPREADSHEETS,
            ]);

            $client->setAuthConfig(
                storage_path('app/google-credentials-client.json')
            );

            $service = new Sheets($client);

            $spreadsheetId =
                '1Z_lYLckrfh7MMokMOFqq_NYaCluMsjg8aiukM1Yhl7k';

            $tab = "'Forwarding Members'";

            $range = $tab . '!A:AL';

            // Convert array fields into readable spreadsheet values.
            $formatValue = static function ($value): string {
                if (is_array($value)) {
                    return implode(', ', array_map(
                        static fn ($item) => is_scalar($item)
                            ? (string) $item
                            : ($item === null
                                ? ''
                                : (json_encode($item, JSON_UNESCAPED_UNICODE) ?: '')),
                        $value
                    ));
                }

                if ($value === null) {
                    return '';
                }

                if (is_bool($value)) {
                    return $value ? 'Yes' : 'No';
                }

                return (string) $value;
            };

            $headers = [[
                'Created At',
                'Company Name',
                'Business Email',
                'Phone',
                'Phone Full',
                'Phone Dial Code',
                'Country',
                'City',
                'Registered Business Address',
                'Company Website',
                'Years in Business',
                'Company Logo',
                'Contact Person Name',
                'Contact Person Designation',
                'Contact Person Email',
                'WhatsApp Available',
                'Services',
                'Trade Lanes',
                'Cargo Capabilities',
                'Markets to Develop',
                'Verification Type',
                'Verification Documents',
                'Business Activity Document',
                'Association Member',
                'Association Details',
                'Payment Recovery Support',
                'Referral',
                'Reference Company Name',
                'Reference Country',
                'Reference Company Website',
                'Reference Contact Person',
                'Reference Designation',
                'Reference Business Email',
                'Reference Phone',
                'Reference Relationship',
                'Reference Relationship Duration',
                'Reference Last Transaction Date',
                'Application Status',
            ]];

            // Ensure headers exist before appending new applications.
            $service->spreadsheets_values->update(
                $spreadsheetId,
                $tab . '!A1:AL1',
                new ValueRange([
                    'values' => $headers,
                ]),
                [
                    'valueInputOption' => 'RAW',
                ]
            );

            $values = [[
                $formatValue($application->created_at?->format('Y-m-d H:i:s')),
                $formatValue($application->company_name),
                $formatValue($application->business_email),
                $formatValue($application->phone),
                $formatValue($application->phone_full),
                $formatValue($application->phone_dial_code),
                $formatValue($application->country),
                $formatValue($application->city),
                $formatValue($application->registered_business_address),
                $formatValue($application->company_website),
                $formatValue($application->years_in_business),
                $formatValue($application->company_logo),
                $formatValue($application->contact_person_name),
                $formatValue($application->contact_person_designation),
                $formatValue($application->contact_person_email),
                $formatValue($application->whatsapp_available),
                $formatValue($application->services),
                $formatValue($application->trade_lanes),
                $formatValue($application->cargo_capabilities),
                $formatValue($application->markets_to_develop),
                $formatValue($application->verification_type),
                $formatValue($application->verification_documents),
                $formatValue($application->business_activity_document),
                $formatValue($application->association_member),
                $formatValue($application->association_details),
                $formatValue($application->payment_recovery_support),
                $formatValue($application->referral),
                $formatValue($application->reference_company_name),
                $formatValue($application->reference_country),
                $formatValue($application->reference_company_website),
                $formatValue($application->reference_contact_person),
                $formatValue($application->reference_designation),
                $formatValue($application->reference_business_email),
                $formatValue($application->reference_phone),
                $formatValue($application->reference_relationship),
                $formatValue($application->reference_relationship_duration),
                $formatValue(
                    $application->reference_last_transaction_date?->format('Y-m-d')
                ),

                // Application Status.
                'pending',
            ]];

            $body = new ValueRange([
                'values' => $values,
            ]);

            $service->spreadsheets_values->append(
                $spreadsheetId,
                $range,
                $body,
                [
                    'valueInputOption' => 'RAW',
                    'insertDataOption' => 'INSERT_ROWS',
                ]
            );

        } catch (Throwable $e) {
            // Keep the saved MySQL application even if Sheets fails.
            Log::error('Forwarding member Google Sheets sync failed.', [
                'application_id' => $application->id,
                'exception' => $e->getMessage(),
            ]);
        }

        return redirect('/')
            ->with(
                'success',
                'Your membership application has been submitted successfully.'
            );
    }
}
