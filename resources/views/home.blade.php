@extends('layouts.app')

@section('content')

    @include('sections.navbar')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.why-join')
    @include('sections.membership')
    @include('sections.faq')
    @include('sections.contact')
    @include('sections.footer')

    {{-- Membership Selection --}}
    @include('components.selection-modal', [
        'id' => 'membershipTypeModal',
        'label' => 'MEMBERSHIP',
        'title' => 'Request an Invitation',
        'description' => 'Choose your membership type to continue.',
        'options' => [
            [
                'title' => 'Freight Forwarding Member',
                'description' => 'For freight forwarding and logistics companies.',
                'icon' => 'fa-solid fa-truck-fast',
                'url' => route('membership.freight-forwarding'),
            ],
            [
                'title' => 'Trade Partner / Trader',
                'description' => 'For traders, importers, exporters and businesses.',
                'icon' => 'fa-solid fa-globe',
                'url' => route('membership.trade-partner'),
            ],
        ],
    ])


    {{-- Buyer / Supplier Selection --}}
    @include('components.selection-modal', [
        'id' => 'buyerSupplierModal',
        'label' => 'FIND A CONNECTION',
        'title' => 'What are you looking for?',
        'description' => 'Choose an option to find the right trade connection.',
        'options' => [
            [
                'title' => 'Commercial or logistics connections',
                'description' => 'Looking to connect with businesses, buyers, sellers, suppliers, distributors or logistics partners',
                'icon' => 'fa-solid fa-boxes-stacked',
                'url' => route('search.suppliers'),
            ],
            [
                'title' => 'Buy/source a specific product requirement',
                'description' => 'Looking for a specific product or supplier for your business.',
                'icon' => 'fa-solid fa-handshake',
                'url' => route('search.buyers'),
            ],
        ],
    ])

    
@endsection

<!-- Form -->
<!-- <section class="container mt-5 mb-5">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-4">Register for Early Access</h3>

        <form id="myForm">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input class="form-control" name="company" placeholder="Company Name">
                </div>

                <div class="col-md-6 mb-3">
                    <input class="form-control" name="contact_person" placeholder="Contact Person Name">
                </div>

                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="col-md-6 mb-3">
                    <input id="phone" type="tel" name="phone" class="form-control" placeholder="Phone">

                    
                    <input type="hidden" name="full_phone" id="full_phone">
                    <input type="hidden" name="dial_code" id="dial_code">
                    <input type="hidden" name="country_iso" id="country_iso">
                </div>

                <div class="col-md-6 mb-3">
                    <select class="form-control" name="country" id="country">
                        <option value="" disabled selected>Select Country</option>

                        @foreach($countries as $code => $country)
                            <option value="{{ $code }}">
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <select class="form-control" name="business_type">
                        <option value="" disabled selected>Business Type</option>
                        <option value="Manufacturer">Manufacturer</option>
                        <option value="Exporter">Exporter</option>
                        <option value="Importer">Importer</option>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <textarea class="form-control" placeholder="Products / Commodities" name="products"></textarea>
                </div>
            </div>

            <button class="btn btn-primary w-100" id="submitBtn">
                Register for Early Access
            </button>
        </form>
    </div>
</section> -->


<!-- <script>
    const phoneInput = document.querySelector("#phone");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "in",
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/utils.js"
    });
</script>

<script>
    document.getElementById("myForm").addEventListener("submit", async function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById("submitBtn");
        submitBtn.disabled = true;
        submitBtn.innerText = "Submitting...";

        const fullPhone = iti.getNumber();
        const countryData = iti.getSelectedCountryData();

        document.getElementById("full_phone").value = fullPhone;
        document.getElementById("dial_code").value = countryData.dialCode;
        document.getElementById("country_iso").value = countryData.iso2;
        if (!document.getElementById("country").value) {
            document.getElementById("country").value = countryData.iso2.toUpperCase();
        }

        const formData = new FormData(this);

        try {
            const res = await fetch("/submit-form", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json"
                },
                body: formData
            });

            const data = await res.json();

            if (!res.ok) {
                const firstError = Object.values(data.errors)[0][0];
                alert(firstError);

                submitBtn.disabled = false;
                submitBtn.innerText = "Register for Early Access";
                return;
            }

            alert(data.message);
            this.reset();
            iti.setCountry("in");

        } catch (err) {
            console.error(err);
            alert("Something went wrong!");

        } finally {
            submitBtn.disabled = false;
            submitBtn.innerText = "Register for Early Access";
        }
    });
</script>
</body>
</html> -->