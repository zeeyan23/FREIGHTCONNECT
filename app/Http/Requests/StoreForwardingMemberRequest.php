<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreForwardingMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Company information
            'company_name' => ['required', 'string', 'max:255'],
            'business_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('forwarding_member_account', 'business_email'),
            ],
            'phone' => ['required', 'string', 'max:30'],
            'phone_full' => ['required', 'string', 'max:30'],
            'phone_dial_code' => ['required', 'string', 'max:10'],
            'country' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:100'],
            'registered_business_address' => ['required', 'string', 'max:2000'],
            'company_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'company_website' => ['required', 'url', 'max:255'],
            'years_in_business' => [
                'required',
                Rule::in(['less_than_5', '5_10', '10_20', '20_plus']),
            ],

            // Contact person
            'contact_person_name' => ['required', 'string', 'max:150'],
            'contact_person_designation' => ['required', 'string', 'max:150'],
            'contact_person_email' => ['required', 'email', 'max:255'],
            'whatsapp_available' => [
                'sometimes',
                'boolean',
            ],

            // Business operations
            'services' => ['required', 'array', 'min:1'],
            'services.*' => [
                'string',
                Rule::in([
                    'ocean_freight',
                    'air_freight',
                    'road_land_transport',
                    'customs_clearance',
                    'warehousing',
                    'project_breakbulk',
                    'multimodal_transport',
                    'other',
                ]),
            ],
            'trade_lanes' => ['required', 'string', 'max:1000'],
            'cargo_capabilities' => ['required', 'array', 'min:1'],
            'cargo_capabilities.*' => [
                'string',
                Rule::in([
                    'general_cargo',
                    'machinery_heavy_equipment',
                    'electronics',
                    'textiles',
                    'food_agriculture',
                    'chemicals',
                    'pharmaceuticals',
                    'automotive',
                    'dangerous_goods',
                    'perishable_goods',
                    'live_animals',
                    'project_oversized',
                    'other',
                ]),
            ],
            'markets_to_develop' => ['required', 'string', 'max:1000'],
            'verification_type' => [
                'required',
                Rule::in([
                    'business_registration',
                    'freight_forwarding_license',
                    'tax_registration',
                    'industry_certification',
                    'other',
                ]),
            ],
            'verification_documents' => ['required', 'array', 'min:1'],
            'verification_documents.*' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],
            'business_activity_document' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],

            // Associations and support
            'association_member' => [
                'required',
                'boolean',
            ],
            'association_details' => ['nullable', 'string', 'max:1000'],
            'payment_recovery_support' => [
                'required',
                'boolean',
            ],
            'referral' => ['nullable', 'string', 'max:100'],

            // Business reference
            'reference_company_name' => ['required', 'string', 'max:255'],
            'reference_country' => ['required', 'string', 'max:100'],
            'reference_company_website' => ['nullable', 'url', 'max:255'],
            'reference_contact_person' => ['required', 'string', 'max:255'],
            'reference_designation' => ['required', 'string', 'max:255'],
            'reference_business_email' => ['required', 'email', 'max:255'],
            'reference_phone' => [
                'required',
                'string',
                'max:50',
            ],

            'reference_phone_full' => [
                'nullable',
                'string',
                'max:255',
            ],

            'reference_phone_dial_code' => [
                'nullable',
                'string',
                'max:255',
            ],
            'reference_relationship' => ['required', 'string',
                Rule::in([
                    'Customer',
                    'Supplier',
                    'Business Partner',
                    'Manufacturer',
                    'Distributor',
                    'Trading Partner',
                    'Other',
                ]),],
            'reference_relationship_duration' => ['required', 'string',
                Rule::in([
                    'Less than 6 months',
                    '6 months to 1 year',
                    '1–3 years',
                    '3–5 years',
                    'More than 5 years',
                ]),],
            'reference_last_transaction_date' => [
                'nullable',
                'date',
                'before_or_equal:today',
            ],

            // Declarations
            'information_accuracy_confirmed' => ['required', 'accepted'],
            'verification_authorization_confirmed' => ['required', 'accepted'],
            'membership_terms_accepted' => ['required', 'accepted'],
        ];
    }
}
