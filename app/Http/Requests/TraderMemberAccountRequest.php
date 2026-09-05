<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TraderMemberAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // Company Information
            'company_name' => ['required', 'string', 'max:255'],

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

            'products' => [
                'required',
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

            'requirement_description' => [
                'nullable',
                'string',
                'max:5000',
            ],

            // Business Verification
            'document_type' => [
                'required',
                Rule::in([
                    'Company Registration Certificate',
                    'Import/Export Registration or Licence',
                    'Trade Licence',
                    'Manufacturer Registration/Certificate',
                    'Other',
                ]),
            ],

            'verification_document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
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
                'unique:trader_member_account,business_email',
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

            // Referral
            'referral_id' => [
                'nullable',
                'string',
                'max:100',
            ],

            // Membership Agreement
            'membership_terms' => [
                'required',
                'accepted',
            ],
        ];
    }
}