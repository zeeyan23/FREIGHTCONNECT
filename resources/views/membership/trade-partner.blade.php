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

            <form action="{{ route('trader.register.store') }}" method="POST" enctype="multipart/form-data" id="vzt0fk">
                @csrf

                <!--1. Company Information -->
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
                        
                        <div class="col-md-6">

                            <label for="business_address">
                                Registered Business Address <span>*</span>
                            </label>

                            <input
                                type="textarea"
                                class="form-control"
                                id="business_address"
                                name="business_address"
                                placeholder="Registered Business Address"
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

                        <!-- Company Website -->
                        <div class="col-md-6">
                            <label for="company_website">
                                Company Website
                            </label>

                            <input
                                type="url"
                                class="form-control"
                                id="company_website"
                                name="company_website"
                                placeholder="https://example.com"
                            >
                        </div>
                        <div class="col-md-6">
                            <label for="company_logo">
                                Company Logo
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                id="company_logo"
                                name="company_logo"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted">
                                Upload JPG, PNG or WEBP. Maximum size: 2 MB.
                            </small>
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

                <!-- 2. Contact Person Information -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>02</span>

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

                        <label for="contact_person_email">
                                Business Email <span>*</span>
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            id="contact_person_email"
                            name="contact_person_email"
                            placeholder="Email address"
                            required
                        >

                        <div class="col-md-6">

                            <label for="business_phone">
                                WhatsApp / Business Phone <span>*</span>
                            </label>

                            <input
                                type="tel"
                                id="trader_phone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter phone number"
                                required
                            >

                            <input type="hidden" name="phone_full" id="trader_phone_full">
                            <input type="hidden" name="phone_dial_code" id="trader_phone_dial_code">

                        </div>
                        
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
                    </div>
                </div>

                <!-- 03. Business Interests -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>03</span>
                        <div>
                            <h2>Business Interests</h2>
                            <p>Tell us what you want to achieve through FreightConnect.</p>
                        </div>
                    </div>

                    <div class="row g-4">

                        <!-- Business Interests -->
                        <div class="col-12">
                            <label class="form-label">
                                What would you like to find through FreightConnect?
                                <span>*</span>
                            </label>

                            <p class="text-muted small">Select all that apply.</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_buyers"
                                            value="Buyers">
                                        <label class="form-check-label" for="interest_buyers">Buyers</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_suppliers"
                                            value="Suppliers / Sellers">
                                        <label class="form-check-label" for="interest_suppliers">Suppliers / Sellers</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_manufacturers"
                                            value="Manufacturers">
                                        <label class="form-check-label" for="interest_manufacturers">Manufacturers</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_importers"
                                            value="Importers">
                                        <label class="form-check-label" for="interest_importers">Importers</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_exporters"
                                            value="Exporters">
                                        <label class="form-check-label" for="interest_exporters">Exporters</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_distributors"
                                            value="Distributors">
                                        <label class="form-check-label" for="interest_distributors">Distributors</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_wholesalers"
                                            value="Wholesalers">
                                        <label class="form-check-label" for="interest_wholesalers">Wholesalers</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_traders"
                                            value="Traders / Trading Companies">
                                        <label class="form-check-label" for="interest_traders">Traders / Trading Companies</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_sourcing"
                                            value="Sourcing Opportunities">
                                        <label class="form-check-label" for="interest_sourcing">Sourcing Opportunities</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_markets"
                                            value="New Markets / Business Opportunities">
                                        <label class="form-check-label" for="interest_markets">New Markets / Business Opportunities</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="business_interests[]" id="interest_logistics"
                                            value="Freight Forwarders / Logistics Services">
                                        <label class="form-check-label" for="interest_logistics">Freight Forwarders / Logistics Services</label>
                                    </div>
                                </div>

                                <div class="col-md-6 business-interest-other">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="business_interests[]"
                                            id="interest_other"
                                            value="Other"
                                        >
                                        <label class="form-check-label" for="interest_other">
                                            Other
                                        </label>
                                    </div>

                                    <input
                                        type="text"
                                        class="form-control mt-2 other-specify-input"
                                        name="business_interest_other"
                                        id="business_interest_other"
                                        placeholder="Please specify"
                                        maxlength="255"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Specific Requirement -->
                        <div class="col-12">
                            <label class="form-label d-block">
                                Do you have a specific requirement at present?
                                <span>*</span>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="has_specific_requirement" id="requirement_yes"
                                    value="1" required>
                                <label class="form-check-label" for="requirement_yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="has_specific_requirement" id="requirement_no"
                                    value="0" required>
                                <label class="form-check-label" for="requirement_no">No</label>
                            </div>

                            <div id="requirement_description_wrapper" class="mt-3" hidden>
                                <label for="requirement_description" class="form-label">
                                    If yes, briefly describe the requirement.
                                </label>

                                <textarea class="form-control"
                                    name="requirement_description"
                                    id="requirement_description"
                                    rows="3"
                                    maxlength="5000"
                                    placeholder="Describe your current requirement"></textarea>
                            </div>
                        </div>

                        <!-- Freight / Logistics Support -->
                        <div class="col-12">
                            <label class="form-label d-block">
                                Do you currently need freight or logistics support?
                                <span>*</span>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="needs_logistics_support" id="logistics_yes"
                                    value="1" required>
                                <label class="form-check-label" for="logistics_yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="needs_logistics_support" id="logistics_no"
                                    value="0" required>
                                <label class="form-check-label" for="logistics_no">No</label>
                            </div>
                        </div>

                        <!-- Business Type -->
                        <div class="col-12">
                            <label class="form-label">
                                What best describes your business? <span>*</span>
                            </label>

                            <p class="text-muted small mb-3">
                                Select all that apply.
                            </p>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_supplier"
                                            value="Supplier / Seller">
                                        <label class="form-check-label" for="business_supplier">
                                            Supplier / Seller
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_buyer"
                                            value="Buyer">
                                        <label class="form-check-label" for="business_buyer">
                                            Buyer
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_manufacturer"
                                            value="Manufacturer">
                                        <label class="form-check-label" for="business_manufacturer">
                                            Manufacturer
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_trader"
                                            value="Trader">
                                        <label class="form-check-label" for="business_trader">
                                            Trader
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_distributor"
                                            value="Distributor">
                                        <label class="form-check-label" for="business_distributor">
                                            Distributor
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_wholesaler"
                                            value="Wholesaler">
                                        <label class="form-check-label" for="business_wholesaler">
                                            Wholesaler
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_importer"
                                            value="Importer">
                                        <label class="form-check-label" for="business_importer">
                                            Importer
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_exporter"
                                            value="Exporter">
                                        <label class="form-check-label" for="business_exporter">
                                            Exporter
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_sourcing"
                                            value="Sourcing Company">
                                        <label class="form-check-label" for="business_sourcing">
                                            Sourcing Company
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 business-type-other">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="business_types[]"
                                            id="business_other"
                                            value="Other">
                                        <label class="form-check-label" for="business_other">
                                            Other
                                        </label>
                                    </div>

                                    <input type="text"
                                        class="form-control mt-2 other-specify-input"
                                        name="business_type_other"
                                        id="business_type_other"
                                        placeholder="Please specify"
                                        maxlength="255">
                                </div>

                            </div>
                        </div>

                        <!-- Products / Product Categories -->
                        <div class="col-12">
                            <label for="products_dealt">
                                What products does your company currently deal in?
                                <span>*</span>
                            </label>

                            <p class="text-muted small">
                                Please list your main products or product categories.
                            </p>

                            <textarea
                                class="form-control"
                                id="products_dealt"
                                name="products_dealt"
                                rows="3"
                                placeholder="e.g. textiles, food products, electronics, building materials"
                                required
                            ></textarea>
                        </div>

                        <!-- Current Trading Countries -->
                        <div class="col-12">
                            <label for="current_trade_countries">
                                Which countries do you currently trade with?
                            </label>

                            <p class="text-muted small">
                                List your main markets and/or sourcing countries.
                            </p>

                            <textarea
                                class="form-control"
                                id="current_trade_countries"
                                name="current_trade_countries"
                                rows="3"
                                placeholder="e.g. UAE, India, Saudi Arabia, China"
                            ></textarea>
                        </div>

                        <!-- Target Countries / Markets -->
                        <div class="col-12">
                            <label for="target_trade_markets">
                                Which countries or markets are you interested in developing?
                            </label>

                            <p class="text-muted small">
                                List the countries or markets where you would like to establish new business relationships.
                            </p>

                            <textarea
                                class="form-control"
                                id="target_trade_markets"
                                name="target_trade_markets"
                                rows="3"
                                placeholder="e.g. Europe, North America, Southeast Asia"
                            ></textarea>
                        </div>

                    </div>
                </div>

                <!-- 04. Trade & Market Information -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>04</span>

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

                <!-- 05. Logistics Requirements -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>05</span>

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

                <!-- 06. Current Requirement -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>06</span>

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

                <!-- 07. Verification -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>07</span>

                        <div>
                            <h2>Company Verification</h2>
                            <p>
                                Please upload the following documents to verify your
                                company's registration and business activity.
                            </p>
                        </div>
                    </div>

                    <div class="row g-4">

                        <!-- Company Registration Document -->
                        <div class="col-md-6">

                            <label for="company_registration_document">
                                Company Registration Document <span>*</span>
                            </label>

                            <p class="text-muted small">
                                Company Registration Certificate, Certificate of
                                Incorporation or equivalent Business Licence.
                            </p>

                            <input
                                type="file"
                                class="form-control"
                                id="company_registration_document"
                                name="company_registration_document"
                                accept=".pdf,.jpg,.jpeg,.png"
                                required
                            >

                        </div>

                        <!-- Evidence of Business Activity -->
                        <div class="col-md-6">

                            <label for="business_activity_document">
                                Evidence of Business Activity <span>*</span>
                            </label>

                            <p class="text-muted small">
                                Upload a recent commercial invoice, purchase order,
                                shipping document or delivery document.
                            </p>

                            <input
                                type="file"
                                class="form-control"
                                id="business_activity_document"
                                name="business_activity_document"
                                accept=".pdf,.jpg,.jpeg,.png"
                                required
                            >

                        </div>

                        <!-- Privacy Notice -->
                        <div class="col-12">
                            <div class="alert alert-light border mb-0">
                                <small>
                                    <i class="bi bi-shield-lock me-1"></i>
                                    You may redact sensitive information before uploading.
                                    Documents are for internal verification only and
                                    will not be published.
                                </small>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- 08. Business Reference -->
                <div class="form-card">

                    <div class="form-card-header">
                        <span>08</span>

                        <div>
                            <h2>Business Reference</h2>
                            <p>Please provide details of a company that can serve as your business reference.</p>
                        </div>
                    </div>

                    <div class="row g-4">

                        <!-- Reference Company Name -->
                        <div class="col-md-6">
                            <label for="reference_company_name">
                                Reference Company Name <span>*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="reference_company_name"
                                name="reference_company_name"
                                placeholder="Enter company name"
                                required
                            >
                        </div>

                        <!-- Country -->
                        <div class="col-md-6">
                            <label for="reference_country">
                                Country <span>*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="reference_country"
                                name="reference_country"
                                placeholder="Enter country"
                                required
                            >
                        </div>

                        <!-- Company Website -->
                        <div class="col-md-6">
                            <label for="reference_company_website">
                                Company Website
                            </label>
                            <input
                                type="url"
                                class="form-control"
                                id="reference_company_website"
                                name="reference_company_website"
                                placeholder="https://example.com"
                            >
                            <small>Optional — if available.</small>
                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-6">
                            <label for="reference_contact_person">
                                Contact Person <span>*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="reference_contact_person"
                                name="reference_contact_person"
                                placeholder="Enter contact person's full name"
                                required
                            >
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="reference_email">
                                Email Address <span>*</span>
                            </label>
                            <input
                                type="email"
                                class="form-control"
                                id="reference_email"
                                name="reference_email"
                                placeholder="Enter business email address"
                                required
                            >
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label for="reference_phone">
                                Phone Number (including country code) <span>*</span>
                            </label>
                            <input
                                type="tel"
                                class="form-control"
                                id="reference_phone"
                                name="reference_phone"
                                placeholder="e.g. +971 50 123 4567"
                                required
                            >
                            <input type="hidden" name="reference_phone_full" id="reference_phone_full">
                            <input type="hidden" name="reference_phone_dial_code" id="reference_phone_dial_code">
                        </div>

                        <!-- Nature of Relationship -->
                        <div class="col-md-6">
                            <label for="nature_of_relationship">
                                Nature of Relationship <span>*</span>
                            </label>
                            <select
                                class="form-select"
                                id="nature_of_relationship"
                                name="nature_of_relationship"
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

                        <!-- Duration of Business Relationship -->
                        <div class="col-md-6">
                            <label for="business_relationship_duration">
                                How Long Have You Worked Together? <span>*</span>
                            </label>
                            <select
                                class="form-select"
                                id="business_relationship_duration"
                                name="business_relationship_duration"
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

                    </div>
                </div>
                
                <div class="membership-agreement">

                    <!-- Membership Terms & Privacy Policy -->
                    <label class="membership-agreement-label">
                        <input
                            type="checkbox"
                            name="membership_terms"
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
                                rel="noopener noreferrer"
                            >
                                FreightConnect Membership Terms & Conditions
                            </a>

                            and

                            <a
                                href="{{ route('legal.privacy-policy') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Privacy Policy
                            </a>.

                            I agree to comply with them throughout my membership.
                            <strong>*</strong>
                        </span>
                    </label>

                    <!-- Accuracy & Authorization Confirmation -->
                    <label class="membership-agreement-label">
                        <input
                            type="checkbox"
                            name="information_accuracy"
                            value="1"
                            required
                        >

                        <span class="membership-custom-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        <span class="membership-agreement-text">
                            I confirm that the information provided is accurate and
                            that I am authorized to submit this application on behalf
                            of the company.
                            <strong>*</strong>
                        </span>
                    </label>

                    <!-- Verification Authorization -->
                    <label class="membership-agreement-label">
                        <input
                            type="checkbox"
                            name="verification_authorization"
                            value="1"
                            required
                        >

                        <span class="membership-custom-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        <span class="membership-agreement-text">
                            I authorize FreightConnect to verify the information
                            provided and, where appropriate, contact the business
                            reference.
                            <strong>*</strong>
                        </span>
                    </label>

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

    const yes = document.getElementById('requirement_yes');
    const no = document.getElementById('requirement_no');
    const wrapper = document.getElementById('requirement_description_wrapper');
    const description = document.getElementById('requirement_description');

    function toggleRequirementDescription() {
        const show = yes.checked;

        wrapper.hidden = !show;
        description.required = show;

        if (!show) {
            description.value = '';
        }
    }

    function toggleRequirement() {

        if (yesRadio.checked) {
            descriptionWrapper.style.display = 'block';
        } else if (noRadio.checked) {
            descriptionWrapper.style.display = 'none';
        }

    }

    yes.addEventListener('change', toggleRequirementDescription);
    no.addEventListener('change', toggleRequirementDescription);

    toggleRequirementDescription();

    yesRadio.addEventListener('change', toggleRequirement);
    noRadio.addEventListener('change', toggleRequirement);

    descriptionWrapper.style.display = 'none';

    const traderForm = document.getElementById('vzt0fk');
    const phoneInput = document.getElementById('trader_phone');
    const phoneFullInput = document.getElementById('trader_phone_full');
    const phoneDialCodeInput = document.getElementById('trader_phone_dial_code');

    // Reference phone
    const referencePhoneInput = document.getElementById('reference_phone');
    const referencePhoneFullInput = document.getElementById('reference_phone_full');
    const referencePhoneDialCodeInput = document.getElementById('reference_phone_dial_code');

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
    traderForm.addEventListener('submit', function () {
        updateTraderPhoneFields();
        updateReferencePhoneFields();
    });

});
</script>

@endsection