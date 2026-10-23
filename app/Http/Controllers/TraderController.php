<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraderMemberAccountRequest;
use App\Models\TraderMemberAccount;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Mail\TraderApplicationSubmitted;
use Illuminate\Support\Facades\Mail;

class TraderController extends Controller
{
    public function store(TraderMemberAccountRequest $request)
    {
        $validated = $request->validated();

        $validated['company_registration_document'] = $request
            ->file('company_registration_document')
            ->store('trader-documents/company-registration', 'local');

        $validated['business_activity_document'] = $request
            ->file('business_activity_document')
            ->store('trader-documents/business-activity', 'local');

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request
                ->file('company_logo')
                ->store('trader-logos', 'local');
        }

        // Save to MySQL first.
        // application_status will default to "pending" in the database.
        $trader = TraderMemberAccount::create($validated);

        // $result = sendTraderApplicationEmail($trader);

        // Send confirmation email to the business email address.
        try {
            Log::info('Trader confirmation email attempt started.', [
                'trader_id' => $trader->id,
                'business_email_present' => !empty($trader->business_email),
            ]);

            Mail::to($trader->business_email)
                ->send(new TraderApplicationSubmitted($trader));

            Log::info('Trader confirmation email send completed.', [
                'trader_id' => $trader->id,
            ]);
        } catch (Throwable $e) {
            Log::error('Trader application email failed.', [
                'trader_id' => $trader->id,
                'exception' => $e->getMessage(),
            ]);
        }

        // Then attempt to append the business details to Google Sheets.
        try {
            $client = new Client();

            $client->setApplicationName(
                'FreightConnect Trade Partners'
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

            // Updated range to include the new column U.
            $range = 'Sheet1!A:U';

            // Convert array fields into readable spreadsheet values.
            $formatValue = static function ($value): string {
                if (is_array($value)) {
                    return implode(', ', array_map(
                        static fn ($item) => is_scalar($item)
                            ? (string) $item
                            : json_encode($item),
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

            $values = [[
                $formatValue($trader->created_at),
                $formatValue($trader->company_name),
                $formatValue($trader->country),
                $formatValue($trader->city),
                $formatValue($trader->business_address),
                $formatValue($trader->business_email),
                $formatValue($trader->company_website),
                $formatValue($trader->business_type),
                $formatValue($trader->contact_person),
                $formatValue($trader->designation),
                $formatValue($trader->contact_person_email),
                $formatValue($trader->phone_full),
                $formatValue($trader->whatsapp_available),
                $formatValue($trader->business_interests),
                $formatValue($trader->business_interest_other),
                $formatValue($trader->products_dealt),
                $formatValue($trader->current_trade_countries),
                $formatValue($trader->target_trade_markets),
                $formatValue($trader->needs_logistics_support),
                $formatValue($trader->logistics_services),

                // New field: Application Status (column U).
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

            $headers = [[
                'Created At',
                'Company Name',
                'Country',
                'City',
                'Business Address',
                'Business Email',
                'Company Website',
                'Business Type',
                'Contact Person',
                'Designation',
                'Contact Email',
                'Phone',
                'WhatsApp Available',
                'Business Interests',
                'Other Business Interest',
                'Products Dealt',
                'Current Trade Countries',
                'Target Trade Markets',
                'Logistics Support Needed',
                'Logistics Services',
                'Application Status',
            ]];

            $service->spreadsheets_values->update(
                $spreadsheetId,
                'Sheet1!A1:U1',
                new ValueRange(['values' => $headers]),
                ['valueInputOption' => 'RAW']
            );
        } catch (Throwable $e) {
            // Keep the saved MySQL application even if Sheets fails.
            Log::error('Trader Google Sheets sync failed.', [
                'trader_id' => $trader->id,
                'exception' => $e->getMessage(),
            ]);
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Trader application submitted successfully.'
            );
    }
}