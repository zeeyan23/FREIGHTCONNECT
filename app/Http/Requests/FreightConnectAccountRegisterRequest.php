<?php

namespace App\Http\Requests;
use App\Support\InternalRedirect;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FreightConnectAccountRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     */
    public function rules(): array
    {
        return [

            // Account Information
            'business_email' => [
                'required',
                'email',
                'max:255',
                'unique:freight_connect_account,business_email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            // Company Information
            'company' => [
                'required',
                'string',
                'max:255',
            ],

            'website' => [
                'nullable',
                'url',
                'max:255',
            ],

            'country' => [
                'required',
                'string',
                'max:10',
            ],

            // Business Type
            'business_type' => [
                'required',
                'array',
                'min:1',
            ],

            'business_type.*' => [
                'string',
                'in:importer_buyer,exporter_seller,trading_distribution,manufacturer,external_business,other',
            ],

            // Contact Information
            'contact' => [
                'required',
                'string',
                'max:255',
            ],

            'contact_email' => [
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

            // Product Categories
            'product_categories' => [
                'required',
                'array',
                'min:1',
            ],

            'product_categories.*' => [
                'string',
                'in:machinery_equipment,textiles_garments,food_spices,chemicals,electronics_electrical,construction_building,automotive_parts,agriculture,other',
            ],

            // Agreement
            'terms' => [
                'accepted',
            ],

            'group_type_id' => [
                'required',
                'integer',
                'exists:group_types,id',
                'in:2,3',
            ],

            'redirect' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    if (!InternalRedirect::isValid($value)) {
                        $fail('Invalid redirect URL.');
                    }
                },
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'business_email.unique' =>
                'An account already exists with this business email.',

            'password.confirmed' =>
                'The password confirmation does not match.',

            'business_type.required' =>
                'Please select at least one business type.',

            'product_categories.required' =>
                'Please select at least one product category.',

            'terms.accepted' =>
                'You must agree to the Terms & Conditions and Privacy Policy.',
        ];
    }
}