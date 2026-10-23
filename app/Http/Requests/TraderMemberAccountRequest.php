<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class TraderMemberAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Company Information
            'company_name' => [
                'required',
                'string',
                'max:255',
            ],

            'company_website' => [
                'required',
                'url',
                'max:255',
            ],

            'country' => [
                'required',
                'string',
                'max:10',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],

            'business_address' => [
                'required',
                'string',
                'max:255',
            ],

            'company_logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'business_type' => [
                'required',
                Rule::in([
                    'Exporter',
                    'Importer',
                    'Exporter & Importer',
                    'Trading Company',
                    'Manufacturer',
                    'Manufacturer & Exporter/Importer',
                    'Other',
                ]),
            ],

            'business_type_other' => [
                'nullable',
                'string',
                'max:255',
            ],

            'products' => [
                'required',
                'string',
                'max:5000',
            ],

            // Contact Information
            'contact_person' => [
                'required',
                'string',
                'max:255',
            ],

            'designation' => [
                'required',
                'string',
                'max:255',
            ],

            'business_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('trader_member_account', 'business_email'),
            ],

            'contact_person_email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'phone_full' => [
                'required',
                'string',
                'max:30',
            ],

            'phone_dial_code' => [
                'required',
                'string',
                'max:10',
            ],

            'whatsapp_available' => [
                'sometimes',
                'boolean',
            ],

            // Business Interests
            'business_interests' => [
                'required',
                'array',
                'min:1',
            ],

            'business_interests.*' => [
                'required',
                'string',
                'distinct',
                Rule::in([
                    'Buyers',
                    'Suppliers / Sellers',
                    'Manufacturers',
                    'Importers',
                    'Exporters',
                    'Distributors',
                    'Wholesalers',
                    'Traders / Trading Companies',
                    'Sourcing Opportunities',
                    'New Markets / Business Opportunities',
                    'Freight Forwarders / Logistics Services',
                    'Other',
                ]),
            ],

            'business_interest_other' => [
                'nullable',
                'string',
                'max:255',
            ],

            // Business Types
            'business_types' => [
                'required',
                'array',
                'min:1',
            ],

            'business_types.*' => [
                'required',
                'string',
                Rule::in([
                    'Supplier / Seller',
                    'Buyer',
                    'Manufacturer',
                    'Trader',
                    'Distributor',
                    'Wholesaler',
                    'Importer',
                    'Exporter',
                    'Sourcing Company',
                    'Other',
                ]),
            ],

            // Requirements
            'has_specific_requirement' => [
                'required',
                'boolean',
            ],

            'requirement_description' => [
                'nullable',
                'required_if:has_specific_requirement,1',
                'string',
                'max:5000',
            ],

            'needs_logistics_support' => [
                'required',
                'boolean',
            ],

            'products_dealt' => [
                'required',
                'string',
                'max:5000',
            ],

            'current_trade_countries' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'target_trade_markets' => [
                'nullable',
                'string',
                'max:5000',
            ],

            // Trade & Market Information
            'exporting_to' => [
                'required',
                'string',
                'max:2000',
            ],

            'importing_from' => [
                'required',
                'string',
                'max:2000',
            ],

            'buyers_in' => [
                'required',
                'string',
                'max:2000',
            ],

            'suppliers_in' => [
                'required',
                'string',
                'max:2000',
            ],

            // Logistics Requirements
            'logistics_services' => [
                'required',
                'array',
                'min:1',
            ],

            'logistics_services.*' => [
                'required',
                'string',
                Rule::in([
                    'Ocean Freight',
                    'Air Freight',
                    'Road Freight',
                    'Customs Clearance',
                    'Warehousing',
                    'Door-to-Door',
                    'Multimodal Transportation',
                    'Other',
                ]),
            ],

            'shipment_frequency' => [
                'nullable',
                Rule::in([
                    'Weekly',
                    'Monthly',
                    'Quarterly',
                    'Occasionally',
                    'As Required',
                ]),
            ],

            // Current Trade Requirement
            'has_requirement' => [
                'required',
                Rule::in(['Yes', 'No']),
            ],

            // Business Verification Documents
            'company_registration_document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],

            'business_activity_document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],

            // Membership Agreement
            'membership_terms' => [
                'required',
                'accepted',
            ],

            'information_accuracy' => [
                'required',
                'accepted',
            ],

            'verification_authorization' => [
                'required',
                'accepted',
            ],

            // Reference Company Information
            'reference_company_name' => [
                'required',
                'string',
                'max:255',
            ],

            'reference_country' => [
                'required',
                'string',
                'max:255',
            ],

            'reference_company_website' => [
                'nullable',
                'url',
                'max:255',
            ],

            'reference_contact_person' => [
                'required',
                'string',
                'max:255',
            ],

            'reference_email' => [
                'required',
                'email',
                'max:255',
            ],

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

            'nature_of_relationship' => [
                'required',
                'string',
                Rule::in([
                    'Customer',
                    'Supplier',
                    'Business Partner',
                    'Manufacturer',
                    'Distributor',
                    'Trading Partner',
                    'Other',
                ]),
            ],

            'business_relationship_duration' => [
                'required',
                'string',
                Rule::in([
                    'Less than 6 months',
                    '6 months to 1 year',
                    '1–3 years',
                    '3–5 years',
                    'More than 5 years',
                ]),
            ],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        // Require business_type_other when "Other" is selected.
        $validator->sometimes(
            'business_type_other',
            ['required', 'string', 'max:255'],
            fn ($input) =>
                ($input->business_type ?? null) === 'Other'
                || in_array(
                    'Other',
                    $input->business_types ?? [],
                    true
                )
        );

        // Require business_interest_other when "Other" is selected.
        $validator->sometimes(
            'business_interest_other',
            ['required', 'string', 'max:255'],
            fn ($input) => in_array(
                'Other',
                $input->business_interests ?? [],
                true
            )
        );
    }
}
