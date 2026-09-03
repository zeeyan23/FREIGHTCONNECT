@extends('layouts.app')

@section('content')

<section class="registration-page">

    <div class="container">

        <div class="registration-header">

            <span class="registration-label">
                FREIGHTCONNECT ACCOUNT
            </span>

            <h1>
                Create Free Account
            </h1>

            <p>
                Create your free business account to connect with
                suppliers, buyers and trade opportunities.
            </p>

        </div>


        <div class="registration-card">

            <form action="#" method="POST">

                {{-- 01 Account Information --}}
                <div class="registration-section">

                    <div class="registration-section-heading">

                        <span>01</span>

                        <div>
                            <h2>Account Information</h2>
                            <p>
                                Create your login credentials.
                            </p>
                        </div>

                    </div>


                    <div class="row g-4">

                        <div class="col-md-12">

                            <label for="business_email">
                                Business Email
                                <span>*</span>
                            </label>

                            <input
                                type="email"
                                id="business_email"
                                name="business_email"
                                class="form-control"
                                placeholder="Enter your business email"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="password">
                                Password
                                <span>*</span>
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Create a password"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="password_confirmation">
                                Confirm Password
                                <span>*</span>
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm your password"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- 02 Company Information --}}
                <div class="registration-section">

                    <div class="registration-section-heading">

                        <span>02</span>

                        <div>
                            <h2>Company Information</h2>
                            <p>
                                Tell us about your business.
                            </p>
                        </div>

                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label for="company">
                                Company
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="company"
                                name="company"
                                class="form-control"
                                placeholder="Company name"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="website">
                                Website
                            </label>

                            <input
                                type="url"
                                id="website"
                                name="website"
                                class="form-control"
                                placeholder="https://example.com"
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="country">
                                Country
                                <span>*</span>
                            </label>

                            <select
                                id="country"
                                name="country"
                                class="form-select"
                                required
                            >

                                <option value="" selected disabled>
                                    Select Country
                                </option>

                                @foreach($countries as $code => $country)

                                    <option value="{{ $code }}">
                                        {{ $country }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>


                {{-- 03 Business Type --}}
                <div class="registration-section">

                    <div class="registration-section-heading">

                        <span>03</span>

                        <div>
                            <h2>Business Type</h2>
                            <p>
                                Select all that apply.
                            </p>
                        </div>

                    </div>


                    <div class="checkbox-grid">

                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="importer_buyer"
                            >
                            <span>Importer / Buyer</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="exporter_seller"
                            >
                            <span>Exporter / Seller</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="trading_distribution"
                            >
                            <span>Trading / Distribution Company</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="manufacturer"
                            >
                            <span>Manufacturer</span>
                        </label>


                        <label class="registration-checkbox">

                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="external_business"
                            >

                            <span>
                                External Business
                            </span>

                            <i
                                class="fa-solid fa-circle-info"
                                title="External Business: A company that is looking for products or suppliers for its own business needs and is not necessarily engaged in regular importing, exporting or trading."
                            ></i>

                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="business_type[]"
                                value="other"
                            >
                            <span>Other</span>
                        </label>

                    </div>

                </div>


                {{-- 04 Contact Information --}}
                <div class="registration-section">

                    <div class="registration-section-heading">

                        <span>04</span>

                        <div>
                            <h2>Contact Information</h2>
                            <p>
                                Provide your primary business contact details.
                            </p>
                        </div>

                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label for="contact">
                                Contact
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                id="contact"
                                name="contact"
                                class="form-control"
                                placeholder="Contact person"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="contact_email">
                                Email
                                <span>*</span>
                            </label>

                            <input
                                type="email"
                                id="contact_email"
                                name="contact_email"
                                class="form-control"
                                placeholder="Contact email"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label for="phone">
                                Phone
                                <span>*</span>
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control"
                                placeholder="Business phone / WhatsApp"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- 05 Product Categories --}}
                <div class="registration-section">

                    <div class="registration-section-heading">

                        <span>05</span>

                        <div>
                            <h2>Product Categories</h2>
                            <p>
                                Select the categories relevant to your business.
                            </p>
                        </div>

                    </div>


                    <div class="checkbox-grid">

                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="machinery_equipment"
                            >
                            <span>Machinery & Equipment</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="textiles_garments"
                            >
                            <span>Textiles & Garments</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="food_spices"
                            >
                            <span>Food & Spices</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="chemicals"
                            >
                            <span>Chemicals</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="electronics_electrical"
                            >
                            <span>Electronics & Electrical</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="construction_building"
                            >
                            <span>Construction & Building Materials</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="automotive_parts"
                            >
                            <span>Automotive & Parts</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="agriculture"
                            >
                            <span>Agriculture & Agricultural Products</span>
                        </label>


                        <label class="registration-checkbox">
                            <input
                                type="checkbox"
                                name="product_categories[]"
                                value="other"
                            >
                            <span>Other</span>
                        </label>

                    </div>

                </div>


                {{-- 06 Agreement --}}
                <div class="registration-section registration-agreement">

                    <label class="agreement-checkbox">

                        <input
                            type="checkbox"
                            name="terms"
                            required
                        >

                        <span>
                            I agree to the
                            <a href="{{ route('legal.external-terms') }}" target="_blank">
                                FreightConnect Terms & Conditions
                            </a>
                            and
                            <a href="{{ route('legal.external-privacy') }}" target="_blank">
                                Privacy Policy
                            </a>.
                        </span>

                    </label>

                </div>


                <div class="registration-submit">

                    <button
                        type="submit"
                        class="create-account-btn"
                    >
                        Create Free Account
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection