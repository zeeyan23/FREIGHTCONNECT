@extends('layouts.app')

@section('content')

<div class="membership-form-page">

    <!-- Page Header -->
    <section class="membership-form-header">
        <div class="container">
            <div class="form-header-content">
                <span class="form-label">MEMBERSHIP APPLICATION</span>

                <h1>
                    Trade Partner
                    <span>Registration</span>
                </h1>

                <p>
                    Please provide your business information below to request
                    a FreightConnect Trade Partner membership invitation.
                </p>
            </div>
        </div>
    </section>


    <!-- Registration Form -->
    <section class="membership-form-section">
        <div class="container">

            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf

                <!-- Company Information -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>01</span>

                        <div>
                            <h2>Company Information</h2>
                            <p>Tell us about your business.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <!-- Company Name -->
                        <div class="col-md-6">
                            <label for="company_name">
                                Company Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="company_name"
                                name="company_name"
                                placeholder="Enter company name"
                                required
                            >
                        </div>


                        <!-- Company Website -->
                        <div class="col-md-6">
                            <label for="company_website">
                                Company Website <span>*</span>
                            </label>

                            <input
                                type="url"
                                class="form-control"
                                id="company_website"
                                name="company_website"
                                placeholder="https://example.com"
                                required
                            >
                        </div>


                        <!-- Country -->
                        <div class="col-md-6">
                            <label for="country">
                                Country <span>*</span>
                            </label>

                            <select
                                class="form-select"
                                id="country"
                                name="country"
                                required
                            >
                            
                                @foreach($countries as $code => $country)
                                    <option value="{{ $code }}">
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Business Type -->
                        <div class="col-12">
                            <label>
                                Business Type <span>*</span>
                            </label>

                            <div class="option-grid">

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Exporter"
                                           required>
                                    <span>Exporter</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Importer">
                                    <span>Importer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Exporter & Importer">
                                    <span>Exporter & Importer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Trading Company">
                                    <span>Trading Company</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Manufacturer">
                                    <span>Manufacturer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Manufacturer & Exporter/Importer">
                                    <span>Manufacturer & Exporter/Importer</span>
                                </label>

                                <label class="choice-option">
                                    <input type="radio"
                                           name="business_type"
                                           value="Other">
                                    <span>Other</span>
                                </label>

                            </div>
                        </div>


                        <!-- Products -->
                        <div class="col-12">
                            <label for="products">
                                Products Traded / Manufactured <span>*</span>
                            </label>

                            <textarea
                                class="form-control"
                                id="products"
                                name="products"
                                rows="3"
                                placeholder="Example: Industrial pumps, compressors, electrical equipment"
                                required
                            ></textarea>

                            <small>
                                List the main products your company trades or manufactures,
                                along with keywords potential buyers or suppliers may use
                                to find your company through FreightConnect.
                            </small>
                        </div>

                    </div>

                </div>


                <!-- Trade & Market Information -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>02</span>

                        <div>
                            <h2>Trade & Market Information</h2>
                            <p>Tell us about your current and target markets.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">
                            <label for="exporting_to">
                                Currently Exporting To <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="exporting_to"
                                name="exporting_to"
                                placeholder="Example: UAE, Saudi Arabia, Germany"
                                required
                            >
                        </div>


                        <div class="col-md-6">
                            <label for="importing_from">
                                Currently Importing From <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="importing_from"
                                name="importing_from"
                                placeholder="Example: China, India, Germany"
                                required
                            >
                        </div>


                        <div class="col-md-6">
                            <label for="buyers_in">
                                Looking for Buyers In <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="buyers_in"
                                name="buyers_in"
                                placeholder="Example: UAE, Saudi Arabia, East Africa"
                                required
                            >
                        </div>


                        <div class="col-md-6">
                            <label for="suppliers_in">
                                Looking for Suppliers In <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="suppliers_in"
                                name="suppliers_in"
                                placeholder="Example: China, India, Turkey"
                                required
                            >
                        </div>

                    </div>

                </div>


                <!-- Logistics Requirements -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>03</span>

                        <div>
                            <h2>Logistics Requirements</h2>
                            <p>Tell us about your logistics needs.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <!-- Logistics Services -->
                        <div class="col-12">

                            <label>
                                Logistics Services Required <span>*</span>
                            </label>

                            <div class="option-grid">

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Ocean Freight">
                                    <span>Ocean Freight</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Air Freight">
                                    <span>Air Freight</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Road Freight">
                                    <span>Road Freight</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Customs Clearance">
                                    <span>Customs Clearance</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Warehousing">
                                    <span>Warehousing</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Door-to-Door">
                                    <span>Door-to-Door</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Multimodal Transportation">
                                    <span>Multimodal Transportation</span>
                                </label>

                                <label class="choice-option">
                                    <input type="checkbox"
                                           name="logistics_services[]"
                                           value="Other">
                                    <span>Other</span>
                                </label>

                            </div>

                        </div>


                        <!-- Shipment Frequency -->
                        <div class="col-md-6">

                            <label>
                                International Shipment Frequency
                            </label>

                            <div class="radio-list">

                                <label>
                                    <input type="radio"
                                           name="shipment_frequency"
                                           value="Weekly">
                                    Weekly
                                </label>

                                <label>
                                    <input type="radio"
                                           name="shipment_frequency"
                                           value="Monthly">
                                    Monthly
                                </label>

                                <label>
                                    <input type="radio"
                                           name="shipment_frequency"
                                           value="Quarterly">
                                    Quarterly
                                </label>

                                <label>
                                    <input type="radio"
                                           name="shipment_frequency"
                                           value="Occasionally">
                                    Occasionally
                                </label>

                                <label>
                                    <input type="radio"
                                           name="shipment_frequency"
                                           value="As Required">
                                    As Required
                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Current Requirement -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>04</span>

                        <div>
                            <h2>Current Trade Requirement</h2>
                            <p>Tell us if you currently have a requirement.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <div class="col-12">

                            <label>
                                Do you currently have a trade or shipment requirement?
                                <span>*</span>
                            </label>

                            <div class="radio-list horizontal">

                                <label>
                                    <input type="radio"
                                           name="has_requirement"
                                           value="Yes"
                                           id="requirement_yes">
                                    Yes
                                </label>

                                <label>
                                    <input type="radio"
                                           name="has_requirement"
                                           value="No"
                                           id="requirement_no">
                                    No
                                </label>

                            </div>

                        </div>


                        <div class="col-12" id="requirement_description_wrapper">

                            <label for="requirement_description">
                                Briefly describe your requirement.
                            </label>

                            <textarea
                                class="form-control"
                                id="requirement_description"
                                name="requirement_description"
                                rows="4"
                                placeholder="Example: Looking for a freight forwarder for machinery shipments from India to UAE."
                            ></textarea>

                        </div>

                    </div>

                </div>


                <!-- Verification -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>05</span>

                        <div>
                            <h2>Business Verification</h2>
                            <p>Upload one relevant business document.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label for="document_type">
                                Document Type <span>*</span>
                            </label>

                            <select
                                class="form-select"
                                id="document_type"
                                name="document_type"
                                required
                            >
                                <option value="">Select document type</option>
                                <option value="Company Registration Certificate">
                                    Company Registration Certificate
                                </option>
                                <option value="Import/Export Registration or Licence">
                                    Import/Export Registration or Licence
                                </option>
                                <option value="Trade Licence">
                                    Trade Licence
                                </option>
                                <option value="Manufacturer Registration/Certificate">
                                    Manufacturer Registration/Certificate
                                </option>
                                <option value="Other">
                                    Other relevant business document
                                </option>
                            </select>

                        </div>


                        <div class="col-md-6">

                            <label for="verification_document">
                                Upload Document <span>*</span>
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                id="verification_document"
                                name="verification_document"
                                accept=".pdf,.jpg,.jpeg,.png"
                                required
                            >

                            <small>
                                Your verification document is used for internal
                                verification and will not be displayed publicly.
                            </small>

                        </div>

                    </div>

                </div>


                <!-- Contact Information -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>06</span>

                        <div>
                            <h2>Contact Information</h2>
                            <p>Provide the person we should contact.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label for="contact_person">
                                Contact Person <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="contact_person"
                                name="contact_person"
                                placeholder="Full name"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="designation">
                                Designation <span>*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="designation"
                                name="designation"
                                placeholder="Example: Managing Director"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="business_email">
                                Business Email <span>*</span>
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="business_email"
                                name="business_email"
                                placeholder="name@company.com"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="business_phone">
                                WhatsApp / Business Phone <span>*</span>
                            </label>

                            <input
                                type="tel"
                                class="form-control"
                                id="business_phone"
                                name="business_phone"
                                placeholder="+971 XX XXX XXXX"
                                required
                            >

                        </div>

                    </div>

                </div>


                <!-- Referral -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>07</span>

                        <div>
                            <h2>Referral</h2>
                            <p>Were you referred by an existing member?</p>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <label for="referral_id">
                                Referral ID / Member Code
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="referral_id"
                                name="referral_id"
                                placeholder="Enter referral ID or member code"
                            >

                            <small>
                                Leave blank if you were not referred.
                            </small>

                        </div>

                    </div>

                </div>


                <!-- Submit -->
                <div class="form-submit">

                    <p>
                        By submitting this application, you confirm that
                        the information provided is accurate.
                    </p>

                    <button type="submit" class="btn btn-primary submit-btn">
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

    const yesRadio = document.getElementById('requirement_yes');
    const noRadio = document.getElementById('requirement_no');
    const descriptionWrapper = document.getElementById('requirement_description_wrapper');

    function toggleRequirement() {

        if (yesRadio.checked) {
            descriptionWrapper.style.display = 'block';
        } else if (noRadio.checked) {
            descriptionWrapper.style.display = 'none';
        }

    }

    yesRadio.addEventListener('change', toggleRequirement);
    noRadio.addEventListener('change', toggleRequirement);

    descriptionWrapper.style.display = 'none';

});
</script>

@endsection