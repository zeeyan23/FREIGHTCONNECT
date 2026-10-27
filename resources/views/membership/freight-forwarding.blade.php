@extends('layouts.app')

@section('content')

<div class="membership-form-page">

    <!-- Page Header -->
    <section class="membership-form-header">
        <div class="container">
            <div class="form-header-content">
                <span class="form-header-label">FREIGHTCONNECT MEMBERSHIP</span>
                <h1>Freight-Forwarding Member Application</h1>
                <p>
                    Apply to join FreightConnect as a verified freight-forwarding
                    and logistics member.
                </p>
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

                <!-- ============================= -->
                <!-- 01 COMPANY INFORMATION -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>01</span>
                        <div>
                            <h2>Company Information</h2>
                            <p>Tell us about your freight-forwarding business.</p>
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

                        
                        <!-- Registered Business Address -->
                        <div class="col-md-6">
                            <label for="registered_business_address" class="form-label">
                                Registered Business Address <span>*</span>
                            </label>
                            <textarea
                                id="registered_business_address"
                                name="registered_business_address"
                                class="form-control"
                                rows="3"
                                placeholder="Enter your registered business address"
                                required
                            ></textarea>
                        </div>

                        <!-- Country & City -->
                        <div class="col-md-6">
                            <label for="country" class="form-label">
                                Country <span>*</span>
                            </label>

                            <select
                                class="form-control"
                                name="country"
                                id="country"
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

                        <div class="col-md-6">
                            <label for="city" class="form-label">
                                City <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="city"
                                id="city"
                                placeholder="e.g. Dubai"
                                required
                            >
                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-6">
                            <label for="contact_person_name" class="form-label">
                                Contact Person Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="contact_person_name"
                                name="contact_person_name"
                                class="form-control"
                                placeholder="e.g. Ahmed Ali"
                                required
                            >
                        </div>

                        <div class="col-md-6">
                            <label for="contact_person_designation" class="form-label">
                                Contact Person's Designation <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="contact_person_designation"
                                name="contact_person_designation"
                                class="form-control"
                                placeholder="e.g. Managing Director"
                                required
                            >
                        </div>

                        
                        <!-- Contact Person Email -->
                        <div class="col-md-6">
                            <label for="contact_person_email" class="form-label">
                                Contact Person Email <span>*</span>
                            </label>
                            <input
                                type="email"
                                id="contact_person_email"
                                name="contact_person_email"
                                class="form-control"
                                placeholder="contact@example.com"
                                required
                            >
                        </div>


                        <!-- Email & Phone -->
                        <div class="col-md-6">
                            <label for="business_email" class="form-label">
                                Business Email <span>*</span>
                            </label>

                            <input
                                type="email"
                                id="business_email"
                                name="business_email"
                                class="form-control"
                                placeholder="email@example.com"
                                required
                            >
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">
                                Phone / WhatsApp <span>*</span>
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter phone number"
                                required
                            >
                            <input type="hidden" name="phone_full" id="phone_full">
                            <input type="hidden" name="phone_dial_code" id="phone_dial_code">
                        </div>
                        
                        <!-- WhatsApp Availability -->
                        <div class="col-md-6">
                            <label for="whatsapp_available">
                                Is this number available on WhatsApp? <span>*</span>
                            </label>

                            <select
                                class="form-select"
                                id="whatsapp_available"
                                name="whatsapp_available"
                            >
                                <option value="" selected disabled>
                                    Select an option
                                </option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <!-- Website -->
                        <div class="col-md-6">
                            <label for="company_website" class="form-label">
                                Company Website <span>*</span>
                            </label>

                            <input
                                type="url"
                                id="company_website"
                                name="company_website"
                                class="form-control"
                                placeholder="https://www.example.com"
                                required
                            >
                        </div>

                                                
                        <!-- Company Logo -->
                        <div class="col-md-6">
                            <label for="company_logo" class="form-label">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                id="company_logo"
                                name="company_logo"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >
                            <p class="form-helper">
                                Optional. Accepted formats: JPG, PNG, and WebP.
                            </p>
                        </div>

                        <!-- Years in Business -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Years in Business <span>*</span>
                            </label>

                            <div class="option-grid">

                                <label class="choice-option">
                                    <input
                                        type="radio"
                                        name="years_in_business"
                                        value="less_than_5"
                                        required
                                    >
                                    <span>Less than 5 years</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="radio"
                                        name="years_in_business"
                                        value="5_10"
                                    >
                                    <span>5–10 years</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="radio"
                                        name="years_in_business"
                                        value="10_20"
                                    >
                                    <span>10–20 years</span>
                                </label>

                                <label class="choice-option">
                                    <input
                                        type="radio"
                                        name="years_in_business"
                                        value="20_plus"
                                    >
                                    <span>20+ years</span>
                                </label>

                            </div>
                        </div>

                    </div>

                </div>


                <!-- ============================= -->
                <!-- 02 SERVICES & CAPABILITIES -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>02</span>
                        <div>
                            <h2>Services & Capabilities</h2>
                            <p>Tell us about your logistics services and expertise.</p>
                        </div>
                    </div>

                    <!-- Services Offered -->
                    <div class="mb-4">

                        <label class="form-label">
                            Services Offered <span>*</span>
                        </label>

                        <div class="option-grid">

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="ocean_freight"
                                >
                                <span>Ocean Freight</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="air_freight"
                                >
                                <span>Air Freight</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="road_land_transport"
                                >
                                <span>Road / Land Transport</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="customs_clearance"
                                >
                                <span>Customs Clearance</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="warehousing"
                                >
                                <span>Warehousing</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="project_breakbulk"
                                >
                                <span>Project / Breakbulk Cargo</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="multimodal_transport"
                                >
                                <span>Multimodal Transport</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="other"
                                >
                                <span>Other</span>
                            </label>

                        </div>

                    </div>


                    <!-- Countries / Trade Lanes -->
                    <div class="mb-4">

                        <label for="trade_lanes" class="form-label">
                            Countries / Trade Lanes Served <span>*</span>
                        </label>

                        <p class="form-helper">
                            Please list the key countries or routes where you
                            regularly handle shipments.
                        </p>

                        <input
                            type="text"
                            id="trade_lanes"
                            name="trade_lanes"
                            class="form-control"
                            placeholder="e.g. UAE–India, UAE–China, Saudi Arabia–Europe"
                            required
                        >

                    </div>


                    <!-- Cargo Capabilities -->
                    <div>

                        <label class="form-label">
                            Cargo & Special Handling Capabilities <span>*</span>
                        </label>

                        <p class="form-helper">
                            Which types of cargo do you regularly handle?
                        </p>

                        <div class="option-grid">

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="general_cargo"
                                >
                                <span>General Cargo</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="machinery_heavy_equipment"
                                >
                                <span>Machinery & Heavy Equipment</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="electronics"
                                >
                                <span>Electronics & Electrical Goods</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="textiles"
                                >
                                <span>Textiles & Garments</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="food_agriculture"
                                >
                                <span>Food & Agricultural Products</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="chemicals"
                                >
                                <span>Chemicals</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="pharmaceuticals"
                                >
                                <span>Pharmaceuticals</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="automotive"
                                >
                                <span>Automotive</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="dangerous_goods"
                                >
                                <span>Dangerous Goods / Hazardous Cargo</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="perishable_goods"
                                >
                                <span>Perishable Goods</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="live_animals"
                                >
                                <span>Live Animals / Pets</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="project_oversized"
                                >
                                <span>Project / Oversized Cargo</span>
                            </label>

                            <label class="choice-option">
                                <input
                                    type="checkbox"
                                    name="cargo_capabilities[]"
                                    value="other"
                                >
                                <span>Other</span>
                            </label>

                        </div>

                    </div>

                </div>


                <!-- ============================= -->
                <!-- 03 BUSINESS DEVELOPMENT -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>03</span>
                        <div>
                            <h2>Business Development</h2>
                            <p>Tell us where you want to grow your business.</p>
                        </div>
                    </div>

                    <div>

                        <label for="markets_to_develop" class="form-label">
                            Markets You Want to Develop <span>*</span>
                        </label>

                        <p class="form-helper">
                            Which countries would you like to develop more
                            business in?
                        </p>

                        <input
                            type="text"
                            id="markets_to_develop"
                            name="markets_to_develop"
                            class="form-control"
                            placeholder="e.g. UAE, Saudi Arabia, India, East Africa"
                            required
                        >

                    </div>

                </div>


                <!-- ============================= -->
                <!-- 04 COMPANY VERIFICATION -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>04</span>
                        <div>
                            <h2>Company Verification</h2>
                            <p>Provide documents confirming your business status.</p>
                        </div>
                    </div>

                    <div>

                        <label for="verification_type" class="form-label">
                            Verification Document Type <span>*</span>
                        </label>

                        <select
                            id="verification_type"
                            name="verification_type"
                            class="form-select"
                            required
                        >
                            <option value="" selected disabled>
                                Select document type
                            </option>

                            <option value="business_registration">
                                Business Registration / Incorporation Certificate
                            </option>

                            <option value="freight_forwarding_license">
                                Freight-Forwarding / Logistics License
                            </option>

                            <option value="tax_registration">
                                Tax / VAT / GST Registration
                            </option>

                            <option value="industry_certification">
                                Industry Certification / Membership
                            </option>

                            <option value="other">
                                Other official business document
                            </option>
                        </select>

                        <p class="form-helper">
                            Upload at least one official document confirming
                            your company's legal/business status.
                        </p>

                        <input
                            type="file"
                            name="verification_documents[]"
                            class="form-control mt-3"
                            accept=".pdf,.jpg,.jpeg,.png"
                            multiple
                            required
                        >

                        <p class="form-helper">
                            You may upload multiple documents. Accepted formats:
                            PDF, JPG, JPEG and PNG.
                        </p>

                        <div class="verification-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>
                                Documents are used for internal verification
                                and will not be displayed publicly.
                            </span>
                        </div>

                        
                        <!-- Business Activity Evidence -->
                        <div class="mt-4">
                            <label for="business_activity_document" class="form-label">
                                Business Activity Evidence
                            </label>

                            <input
                                type="file"
                                id="business_activity_document"
                                name="business_activity_document"
                                class="form-control"
                                accept=".pdf,.jpg,.jpeg,.png"
                            >

                            <p class="form-helper">
                                Optional. Upload a document showing your company's business activity.
                                Accepted formats: PDF, JPG, JPEG and PNG.
                            </p>
                        </div>

                    </div>

                </div>


                <!-- ============================= -->
                <!-- 05 ASSOCIATIONS & PAYMENT -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>05</span>
                        <div>
                            <h2>Associations & Payment Support</h2>
                            <p>Tell us about your network memberships and support preferences.</p>
                        </div>
                    </div>


                    <!-- Associations -->
                    <div class="mb-5">

                        <label class="form-label">
                            Associations & Networks <span>*</span>
                        </label>

                        <p class="form-helper">
                            Are you currently a member of any freight-forwarding
                            associations or logistics networks?
                        </p>

                        <div class="radio-list">

                            <label class="radio-option">
                                <input type="radio" name="association_member" value="1" id="association_yes" required>
                                <span>Yes</span>
                            </label>

                            <label class="radio-option">
                                <input type="radio" name="association_member" value="0" id="association_no">
                                <span>No</span>
                            </label>

                        </div>


                        <div
                            id="association_details_wrapper"
                            class="conditional-field"
                            style="display: none;"
                        >
                            <label for="association_details" class="form-label">
                                Name of Associations / Networks
                            </label>

                            <input
                                type="text"
                                id="association_details"
                                name="association_details"
                                class="form-control"
                                placeholder="Enter association or network names"
                            >
                        </div>

                    </div>


                    <!-- Payment Recovery Support -->
                    <div class="payment-support-box">

                        <div class="payment-support-icon">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>

                        <div class="payment-support-content">

                            <span class="payment-support-label">
                                OPTIONAL MEMBER SERVICE
                            </span>

                            <h3>
                                Member Payment Recovery Support
                            </h3>

                            <p>
                                Would you like to opt for FreightConnect's
                                Member Payment Recovery Support?
                            </p>

                            <div class="radio-list">

                                <label class="radio-option">
                                    <input
                                        type="radio"
                                        name="payment_recovery_support"
                                        value="1"
                                        
                                    >
                                    <span>
                                        Yes, I would like to opt in
                                    </span>
                                </label>

                                <label class="radio-option">
                                    <input
                                        type="radio"
                                        name="payment_recovery_support"
                                        value="0"
                                    >
                                    <span>
                                        No, I do not require it
                                    </span>
                                </label>

                            </div>
                            <span class="payment-agreement-text">
                                View Member Payment Recovery
                                <a
                                    href="{{ route('legal.payment-recovery') }}"
                                    target="_blank"
                                >
                                    Support details & Terms & Conditions
                                </a>
                                <strong>*</strong>

                            </span>
                            
                        </div>

                    </div>

                </div>

                
                <!-- ============================= -->
                <!-- 06 BUSINESS REFERENCE -->
                <!-- ============================= -->

                <div class="form-card">
                    <div class="form-card-header">
                        <span>06</span>
                        <div>
                            <h2>Business Reference</h2>
                            <p>Provide details of a company that can verify your business relationship.</p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="reference_company_name" class="form-label">
                                Reference Company Name <span>*</span>
                            </label>
                            <input 
                                type="text" 
                                id="reference_company_name"
                                placeholder="Enter company name"
                                name="reference_company_name" class="form-control" 
                                maxlength="255" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reference_country" class="form-label">
                                Country <span>*</span>
                            </label>
                            <select
                                class="form-control"
                                placeholder="Enter country"
                                name="reference_country"
                                id="reference_country"
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

                        <div class="col-md-6">
                            <label for="reference_company_website" class="form-label">
                                Reference Company Website
                            </label>
                            <input type="url" id="reference_company_website"
                                name="reference_company_website" class="form-control"
                                placeholder="https://example.com">
                        </div>

                        <div class="col-md-6">
                            <label for="reference_contact_person" class="form-label">
                                Reference Contact Person <span>*</span>
                            </label>
                            <input type="text" id="reference_contact_person"
                                name="reference_contact_person" 
                                class="form-control"
                                placeholder="Enter contact person's full name"
                                maxlength="255" required>
                        </div>

                        <div class="col-md-6">
                            <label 
                                for="reference_designation" class="form-label">
                                Reference Contact Designation <span>*</span>
                            </label>
                            <input type="text" id="reference_designation"
                                name="reference_designation" class="form-control" placeholder="Enter contact person's designation"
                                maxlength="255" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reference_business_email" class="form-label">
                                Reference Business Email <span>*</span>
                            </label>
                            <input type="email" id="reference_business_email"
                                name="reference_business_email" class="form-control" placeholder="Enter business email address"
                                maxlength="255" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reference_phone" class="form-label">
                                Reference Phone Number <span>*</span>
                            </label>
                            <input type="tel" id="reference_phone"
                                name="reference_phone" class="form-control" placeholder="e.g. +971 50 123 4567"
                                maxlength="30" required>
                            <input type="hidden" name="reference_phone_full" id="reference_phone_full">
                            <input type="hidden" name="reference_dial_code" id="reference_dial_code">
                        </div>

                        <div class="col-md-6">
                            <label for="reference_relationship" class="form-label">
                                Business Relationship <span>*</span>
                            </label>
                            <select
                                class="form-select"
                                id="reference_relationship"
                                name="reference_relationship"
                                required
                            >
                                <option value="">Select relationship</option>
                                <option value="Customer">Customer</option>
                                <option value="Supplier">Supplier</option>
                                <option value="Business Partner">Business Partner</option>
                                <option value="Manufacturer">Manufacturer</option>
                                <option value="Distributor">Distributor</option>
                                <option value="Trading Partner">Trading Partner</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="reference_relationship_duration" class="form-label">
                                Relationship Duration <span>*</span>
                            </label>
                            <select
                                class="form-select"
                                id="reference_relationship_duration"
                                name="reference_relationship_duration"
                                required
                            >
                                <option value="">Select duration</option>
                                <option value="Less than 6 months">Less than 6 months</option>
                                <option value="6 months to 1 year">6 months to 1 year</option>
                                <option value="1–3 years">1–3 years</option>
                                <option value="3–5 years">3–5 years</option>
                                <option value="More than 5 years">More than 5 years</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="reference_last_transaction_date" class="form-label">
                                Date of Last Transaction
                            </label>
                            <input type="date" id="reference_last_transaction_date"
                                name="reference_last_transaction_date" class="form-control" placeholder="Last date of transaction">
                        </div>
                    </div>
                </div>


                <!-- ============================= -->
                <!-- 06 REFERRAL -->
                <!-- ============================= -->

                <div class="form-card">

                    <div class="form-card-header">
                        <span>06</span>
                        <div>
                            <h2>Referral</h2>
                            <p>Let us know if an existing member referred you.</p>
                        </div>
                    </div>

                    <div>

                        <label for="referral" class="form-label">
                            Referral ID / Member Code
                        </label>

                        <input
                            type="text"
                            id="referral"
                            name="referral"
                            class="form-control"
                            placeholder="Enter Referral ID / Member Code"
                        >

                        <p class="form-helper">
                            Leave blank if you were not referred by an existing
                            FreightConnect member.
                        </p>

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
                <div class="form-submit">

                    <button type="submit" class="btn btn-primary">
                        Submit Application
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                    <p>
                        By submitting this application, you confirm that the
                        information provided is accurate.
                    </p>

                </div>

            </form>

        </div>
    </section>

</div>


<!-- ================================= -->
<!-- PAYMENT RECOVERY TERMS MODAL -->
<!-- ================================= -->

<!-- <div
    class="modal fade"
    id="paymentRecoveryModal"
    tabindex="-1"
    aria-labelledby="paymentRecoveryModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content payment-terms-modal">

            <div class="modal-header">

                <div>
                    <span class="membership-modal-label">
                        MEMBER SUPPORT
                    </span>

                    <h5
                        class="modal-title"
                        id="paymentRecoveryModalLabel"
                    >
                        Member Payment Recovery Support
                    </h5>
                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>

            <div class="modal-body">

                <h6>Payment Recovery Support</h6>

                <p>
                    FreightConnect's Member Payment Recovery Support is an
                    optional service designed to assist members with
                    certain payment recovery matters involving business
                    transactions.
                </p>

                <h6>Important Information</h6>

                <p>
                    By opting into this service, the member acknowledges that
                    FreightConnect may provide support or assistance in
                    accordance with its applicable procedures and terms.
                </p>

                <p>
                    The service does not guarantee recovery of any outstanding
                    amount, and members remain responsible for providing
                    accurate transaction and supporting documentation.
                </p>

                <h6>Terms & Conditions</h6>

                <p>
                    Detailed terms and conditions governing the Member Payment
                    Recovery Support service will apply to participating
                    members.
                </p>

                <p class="terms-note">
                    <i class="fa-solid fa-circle-info"></i>
                    Please review the applicable terms before opting into
                    the service.
                </p>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

            </div>

        </div>

    </div>
</div> -->


<!-- Association Toggle -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const yesRadio = document.getElementById('association_yes');
    const noRadio = document.getElementById('association_no');
    const detailsWrapper =
        document.getElementById('association_details_wrapper');

    // const phoneInput = document.querySelector("#phone");

    // const iti = window.intlTelInput(phoneInput, {
    //     initialCountry: "ae",
    //     separateDialCode: true,
    //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/utils.js"
    // });

    function toggleAssociation() {

        if (yesRadio.checked) {
            detailsWrapper.style.display = 'block';
        } else if (noRadio.checked) {
            detailsWrapper.style.display = 'none';
        }

    }

    yesRadio.addEventListener('change', toggleAssociation);
    noRadio.addEventListener('change', toggleAssociation);

    const freightForm = document.getElementById("myForm");
    const phoneInput = document.getElementById('phone');
    const phoneFullInput = document.getElementById('phone_full');
    const phoneDialCodeInput = document.getElementById('phone_dial_code');

    const referencePhoneInput = document.getElementById('reference_phone');
    const referencePhoneFullInput = document.getElementById('reference_phone_full');
    const referencePhoneDialCodeInput = document.getElementById('reference_dial_code');

    

    const itiOptions = {
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/utils.js"
    };

    const iti = window.intlTelInput(phoneInput, itiOptions);
    const referenceIti = window.intlTelInput(referencePhoneInput, itiOptions);

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
    function updateTraderPhoneFields() {
        updatePhoneFields(
            iti,
            phoneInput,
            phoneFullInput,
            phoneDialCodeInput
        );
    }

    phoneInput.addEventListener('input', updateTraderPhoneFields);
    phoneInput.addEventListener('change', updateTraderPhoneFields);
    phoneInput.addEventListener('countrychange', updateTraderPhoneFields);

    // Reference phone
    function updateReferencePhoneFields() {
        updatePhoneFields(
            referenceIti,
            referencePhoneInput,
            referencePhoneFullInput,
            referencePhoneDialCodeInput
        );
    }

    referencePhoneInput.addEventListener('input', updateReferencePhoneFields);
    referencePhoneInput.addEventListener('change', updateReferencePhoneFields);
    referencePhoneInput.addEventListener('countrychange', updateReferencePhoneFields);

    // Update both phone fields before submitting the form
    freightForm.addEventListener('submit', function () {
        updateTraderPhoneFields();
        updateReferencePhoneFields();
    });       

});
</script>

@endsection