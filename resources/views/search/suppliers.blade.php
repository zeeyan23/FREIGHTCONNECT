@extends('layouts.app')

@section('body-class', 'freight-forwarding-page')

@section('content')

<div class="membership-form-page">

    <!-- Page Header -->
    <section class="membership-form-header">
        <div class="container">
            <div class="form-header-content">
                <span class="form-header-label">SELL / SUPPLY</span>
                <h1>Showcase Your Products to Global Buyers</h1>
            </div>
        </div>
    </section>


    <!-- Application Form -->
     @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix these errors:</strong>

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="membership-form-section">
        <div class="container">

            <form action="{{ route('membership.freight-forwarding.store') }}"
                method="POST"
                enctype="multipart/form-data" id="myForm">
            @csrf

                
                <div class="form-card">

                    <div class="form-card-header">
                        <span>01</span>
                        <div>
                            <h2>Product & Supply Information</h2>
                            <p>Tell us about the products you offer, their specifications, and the type of buyers or trade partners you want to connect with.</p>
                        </div>
                    </div>

                    <div class="row g-4">

                        <!-- Product / Commodity -->
                        <div class="col-md-6">
                            <label for="product_name" class="form-label">
                                Product / Commodity <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="product_name"
                                name="product_name"
                                class="form-control"
                                placeholder="e.g. Rice, Steel, Cotton, Machinery"
                                required
                            >
                        </div>

                        <!-- Product Specifications -->
                        <div class="col-md-6">
                            <label for="product_description" class="form-label">
                                Product Specifications / Description
                            </label>

                            <textarea
                                id="product_description"
                                name="product_description"
                                class="form-control"
                                rows="3"
                                placeholder="Describe product quality, grade, specifications, packaging, certifications, etc."
                            ></textarea>
                        </div>

                        <!-- Looking For -->
                        <div class="col-md-12">
                            <label class="form-label">
                                Looking For <span>*</span>
                            </label>

                            <p class="text-muted small">
                                Select the type of buyers or trade partners you want to connect with.
                            </p>

                            <div class="option-grid">

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Buyer"
                                    >
                                    <span>Buyer</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Importer"
                                    >
                                    <span>Importer</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Distributor"
                                    >
                                    <span>Distributor</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Wholesaler"
                                    >
                                    <span>Wholesaler</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Retailer"
                                    >
                                    <span>Retailer</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="checkbox"
                                        name="looking_for[]"
                                        value="Other"
                                    >
                                    <span>Other</span>
                                </label>

                            </div>
                        </div>

                        <!-- Available Quantity -->
                        <div class="col-md-6">
                            <label for="available_quantity" class="form-label">
                                Available Quantity
                                <small class="text-muted">(Optional)</small>
                            </label>

                            <input
                                type="number"
                                id="available_quantity"
                                name="available_quantity"
                                class="form-control"
                                placeholder="Enter available quantity"
                                min="0.01"
                                step="any"
                            >
                        </div>

                        <!-- Unit of Measurement -->
                        <div class="col-md-6">
                            <label for="unit_of_measurement" class="form-label">
                                Unit of Measurement
                                <small class="text-muted">(Optional)</small>
                            </label>

                            <select
                                id="unit_of_measurement"
                                name="unit_of_measurement"
                                class="form-select"
                            >
                                <option value="" selected>Select unit</option>
                                <option value="MT">Metric Ton (MT)</option>
                                <option value="KG">Kilogram (KG)</option>
                                <option value="Grams">Grams (G)</option>
                                <option value="Pieces">Pieces</option>
                                <option value="Litres">Litres (L)</option>
                                <option value="Units">Units</option>
                                <option value="Containers">Containers</option>
                                <option value="Boxes">Boxes</option>
                                <option value="Pallets">Pallets</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Country of Origin -->
                        <div class="col-md-6">
                            <label for="origin_country" class="form-label">
                                Country of Origin <span>*</span>
                            </label>

                            <select
                                class="form-control"
                                placeholder="Enter country"
                                name="origin_country"
                                id="origin_country"
                                required
                            >
                                <option value="" disabled selected>
                                    Select Country
                                </option>

                                @foreach($countries as $code => $country)
                                    <option value="{{ $code }}">
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Country of Supply -->
                        <div class="col-md-6">
                            <label for="supply_country" class="form-label">
                                Country of Supply
                                <small class="text-muted">(Optional)</small>
                            </label>

                            <select
                                class="form-control"
                                placeholder="Enter country"
                                name="supply_country"
                                id="supply_country"
                                required
                            >
                                <option value="" disabled selected>
                                    Select Country
                                </option>

                                @foreach($countries as $code => $country)
                                    <option value="{{ $code }}">
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Additional Requirements -->
                        <div class="col-md-12">
                            <label for="additional_requirements" class="form-label">
                                Additional Requirements / Message
                                <small class="text-muted">(Optional)</small>
                            </label>

                            <textarea
                                id="additional_requirements"
                                name="additional_requirements"
                                class="form-control"
                                rows="4"
                                placeholder="Mention pricing preferences, delivery terms, certifications, packaging, or other relevant details..."
                            ></textarea>
                        </div>

                    </div>
                </div>

                <div class="form-card">

                    <div class="form-card-header">
                        <span>02</span>
                        <div>
                            <h2>Company & Contact Information</h2>
                            <!-- <p>Provide your company details and contact information so we can connect you with relevant trade partners.</p> -->
                        </div>
                    </div>

                    <div class="row g-4">

                        <!-- Company Name -->
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">
                                Company Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="company_name"
                                name="company_name"
                                class="form-control"
                                placeholder="Enter your company name"
                                required
                            >
                        </div>

                        <!-- Country -->
                        <div class="col-md-6">
                            <label for="country" class="form-label">
                                Country <span>*</span>
                            </label>

                            <select
                                class="form-control"
                                placeholder="Enter country"
                                name="company_country"
                                id="company_country"
                                required
                            >
                                <option value="" disabled selected>
                                    Select Country
                                </option>

                                @foreach($countries as $code => $country)
                                    <option value="{{ $code }}">
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <label for="city" class="form-label">
                                City <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control"
                                placeholder="Enter your city"
                                required
                            >
                        </div>

                        <!-- Trader Type -->
                        <div class="col-md-12">
                            <label class="form-label">
                                Trader Type <span>*</span>
                            </label>

                            <p class="text-muted small">
                                Select all roles that apply to your business.
                            </p>

                            <div class="option-grid">

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Buyer">
                                    <span>Buyer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Seller">
                                    <span>Seller</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Importer">
                                    <span>Importer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Exporter">
                                    <span>Exporter</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Manufacturer">
                                    <span>Manufacturer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Distributor">
                                    <span>Distributor</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Wholesaler">
                                    <span>Wholesaler</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox" name="trader_type[]" value="Other">
                                    <span>Other</span>
                                </label>

                            </div>
                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-6">
                            <label for="contact_person" class="form-label">
                                Contact Person Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="contact_person"
                                name="contact_person"
                                class="form-control"
                                placeholder="Enter contact person's full name"
                                required
                            >
                        </div>

                        <!-- Business Email -->
                        <div class="col-md-6">
                            <label for="business_email" class="form-label">
                                Business Email <span>*</span>
                            </label>

                            <input
                                type="email"
                                id="business_email"
                                name="business_email"
                                class="form-control"
                                placeholder="name@company.com"
                                required
                            >

                            <small class="text-muted">
                                A company email address is preferred. Email verification required.
                            </small>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-6">
                            <label for="phone" class="form-label">
                                Phone Number <span>*</span>
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter your phone number"
                                required
                            >
                            <input type="hidden" name="phone_full" id="phone_full">
                            <input type="hidden" name="phone_dial_code" id="phone_dial_code">

                            <small class="text-muted">
                                Phone number verification required.
                            </small>
                        </div>

                    </div>
                </div>

                <div class="membership-agreement">

                    <label class="membership-agreement-label">

                        <input
                            type="checkbox"
                            name="membership_terms_accepted"
                            value="1"
                            required
                        >

                        <span class="membership-custom-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        <span class="membership-agreement-text">

                            I have read, understood and agree to the

                            <a
                                href="{{ route('legal.membership-terms') }}"
                                target="_blank"
                            >
                                FreightConnect Membership Terms & Conditions
                            </a>

                            and agree to comply with them throughout my membership.

                            <strong>*</strong>

                        </span>

                    </label>

                                        
                    <!-- Information Accuracy Declaration -->
                    <label class="membership-agreement-label">
                        <input
                            type="checkbox"
                            id="information_accuracy_confirmed"
                            name="information_accuracy_confirmed"
                            value="1"
                            required
                        >

                        <span class="membership-custom-check">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span class="membership-agreement-text">
                            I confirm that the information provided is accurate and that I am
                            authorized to submit this application on behalf of my company.
                            <strong>*</strong>
                        </span>
                    </label>

                    <!-- Verification Authorization -->
                    <label class="membership-agreement-label">
                        <input
                            type="checkbox"
                            id="verification_authorization_confirmed"
                            name="verification_authorization_confirmed"
                            value="1"
                            required
                        >
                        <span class="membership-custom-check">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span class="membership-agreement-text">
                            I authorize FreightConnect to verify the information provided,
                            contact the listed business reference, and conduct reasonable
                            business verification checks.
                            <strong>*</strong>
                        </span>
                    </label>


                </div>

                <!-- Submit -->
                <div class="form-submit d-flex flex-column align-items-center gap-2">

                    <p class="text-center text-black fw-bold mb-0">
                        By submitting the application you confirm that the information provided is accurate
                    </p>

                    <button type="submit" class="btn w-100 submit-btn">
                        Submit Application
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const freightForm = document.getElementById("buyerForm");
    const phoneInput = document.getElementById('phone');
    const phoneFullInput = document.getElementById('phone_full');
    const phoneDialCodeInput = document.getElementById('phone_dial_code');

    const itiOptions = {
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/utils.js"
    };

    const iti = window.intlTelInput(phoneInput, itiOptions);

    function updatePhoneFields(phoneIti, phoneInput, fullInput, dialCodeInput) {
        const countryData = phoneIti.getSelectedCountryData();
        const localNumber = phoneInput.value.replace(/\D/g, "");

        dialCodeInput.value = countryData.dialCode
            ? "+" + countryData.dialCode
            : "";

        fullInput.value = countryData.dialCode && localNumber
            ? "+" + countryData.dialCode + localNumber
            : "";
    }

    // Trader phone
    function updateBuyerPhoneFields() {
        updatePhoneFields(
            iti,
            phoneInput,
            phoneFullInput,
            phoneDialCodeInput
        );
    }

    phoneInput.addEventListener('input', updateBuyerPhoneFields);
    phoneInput.addEventListener('change', updateBuyerPhoneFields);
    phoneInput.addEventListener('countrychange', updateBuyerPhoneFields);

    // Update both phone fields before submitting the form
    freightForm.addEventListener('submit', function () {
        updateBuyerPhoneFields();
    });      
    
    setTimeout(function () {

        const modalElement = document.getElementById('tradeMemberAccessModal');
        if (!modalElement) return;
        const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        modal.show();

    }, 2000);

});
</script>

@include('components.selection-modal', [
        'id' => 'tradeMemberAccessModal',
        'label' => 'TRADE MEMBER ACCESS',
        'title' => 'Are you a FreightConnect Trade Member?',
        'description' => 'If you are already a registered Trade Member, log in to access your saved company information. Otherwise, continue as a guest.',
        'options' => [
            [
                'title' => 'Yes, I am a Trade Member',
                'description' => 'Log in using your registered business email and password to continue.',
                'icon' => 'fa-solid fa-user-check',
                'url' => '#tradeMemberLogin',
            ],
            [
                'title' => 'Continue as a Guest',
                'description' => 'Proceed without logging in and provide your company and contact details.',
                'icon' => 'fa-solid fa-user-plus',
                'url' => '#guestUser',
            ],
        ],
    ])
@endsection