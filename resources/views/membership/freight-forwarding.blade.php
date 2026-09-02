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
    <section class="membership-form-section">
        <div class="container">

            <form action="#" method="POST" enctype="multipart/form-data">
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
                            <label for="contact_person" class="form-label">
                                Contact Person & Designation <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="contact_person"
                                name="contact_person"
                                class="form-control"
                                placeholder="e.g. Ahmed Ali - Managing Director"
                                required
                            >
                        </div>

                        <!-- Email & Phone -->
                        <div class="col-md-6">
                            <label for="business_contact" class="form-label">
                                Business Email & Phone / WhatsApp <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="business_contact"
                                name="business_contact"
                                class="form-control"
                                placeholder="email@example.com / +971..."
                                required
                            >
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
                                <input
                                    type="radio"
                                    name="association_member"
                                    value="yes"
                                    id="association_yes"
                                    required
                                >
                                <span>Yes</span>
                            </label>

                            <label class="radio-option">
                                <input
                                    type="radio"
                                    name="association_member"
                                    value="no"
                                    id="association_no"
                                >
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
                                        value="yes"
                                        required
                                    >
                                    <span>
                                        Yes, I would like to opt in
                                    </span>
                                </label>

                                <label class="radio-option">
                                    <input
                                        type="radio"
                                        name="payment_recovery_support"
                                        value="no"
                                    >
                                    <span>
                                        No, I do not require it
                                    </span>
                                </label>

                            </div>

                            <button
                                type="button"
                                class="terms-button"
                                data-bs-toggle="modal"
                                data-bs-target="#paymentRecoveryModal"
                            >
                                <i class="fa-solid fa-file-contract"></i>
                                View Member Payment Recovery Support
                                details & Terms & Conditions
                            </button>

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

<div
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
</div>


<!-- Association Toggle -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const yesRadio = document.getElementById('association_yes');
    const noRadio = document.getElementById('association_no');
    const detailsWrapper =
        document.getElementById('association_details_wrapper');

    function toggleAssociation() {

        if (yesRadio.checked) {
            detailsWrapper.style.display = 'block';
        } else if (noRadio.checked) {
            detailsWrapper.style.display = 'none';
        }

    }

    yesRadio.addEventListener('change', toggleAssociation);
    noRadio.addEventListener('change', toggleAssociation);

});
</script>

@endsection