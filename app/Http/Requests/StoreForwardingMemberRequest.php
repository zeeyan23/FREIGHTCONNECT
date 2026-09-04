<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreForwardingMemberRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 01. Company Information
            'company_name' => [
                'required',
                'string',
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
                'max:100',
            ],

            'contact_person_name' => [
                'required',
                'string',
                'max:150',
            ],

            'contact_person_designation' => [
                'required',
                'string',
                'max:150',
            ],

            'business_email' => [
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

            'company_website' => [
                'required',
                'url',
                'max:255',
            ],

            'years_in_business' => [
                'required',
                Rule::in([
                    'less_than_5',
                    '5_10',
                    '10_20',
                    '20_plus',
                ]),
            ],

            // 02. Services & Capabilities
            'services' => [
                'required',
                'array',
                'min:1',
            ],

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

            'trade_lanes' => [
                'required',
                'string',
                'max:1000',
            ],

            'cargo_capabilities' => [
                'required',
                'array',
                'min:1',
            ],

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

            // 03. Business Development
            'markets_to_develop' => ['required', 'string', 'max:1000'],

            // 04. Company Verification
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

            'verification_documents' => [
                'required',
                'array',
                'min:1',
            ],

            'verification_documents.*' => [
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],

            // 05. Associations & Payment
            'association_member' => [
                'required',
                Rule::in([
                    'yes',
                    'no',
                ]),
            ],

            'association_details' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'payment_recovery_support' => [
                'required',
                Rule::in([
                    'yes',
                    'no',
                ]),
            ],

            // 06. Referral
            'referral' => [
                'nullable',
                'string',
                'max:100',
            ],

            // Membership Terms
            'membership_terms' => [
                'required',
                'accepted',
            ],
        ];
    }
}
