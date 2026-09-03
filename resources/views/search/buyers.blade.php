@extends('layouts.app')

@section('content')

<section class="buyer-search-page">

    <div class="container">

        {{-- Page Header --}}
        <div class="buyer-search-header">

            <span class="search-label">
                FIND A BUYER
            </span>

            <h1>
                Find the right buyers
            </h1>

            <p>
                Search for buyers interested in the products you offer.
            </p>

        </div>


        {{-- Compact Search Filters --}}
        <div class="buyer-filter-bar">

            <form action="#" method="GET">

                <div class="buyer-filter-row">

                    {{-- Products --}}
                    <div class="filter-item filter-products">

                        <label class="search-form-label">
                            Product(s)
                        </label>

                        <div id="buyer-product-fields">

                            <div class="product-input-row">

                                <input
                                    type="text"
                                    name="products[]"
                                    class="form-control"
                                    placeholder="Type product / keyword"
                                    required
                                >

                            </div>

                        </div>

                        <button
                            type="button"
                            id="add-buyer-product"
                            class="add-product-btn"
                        >
                            <i class="fa-solid fa-plus"></i>
                            Add product
                        </button>

                    </div>


                    {{-- Buyer Country --}}
                    <div class="filter-item">

                        <label for="buyer_country" class="search-form-label">
                            Buyer Country
                        </label>

                        <select
                            name="country"
                            id="buyer_country"
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


                    {{-- Quantity --}}
                    <div class="filter-item">

                        <label for="buyer_quantity" class="search-form-label">
                            Quantity
                            <span>(Optional)</span>
                        </label>

                        <input
                            type="text"
                            name="quantity"
                            id="buyer_quantity"
                            class="form-control"
                            placeholder="e.g. 500 units"
                        >

                    </div>


                    {{-- Shipping --}}
                    <div class="filter-item filter-shipping">

                        <label class="search-form-label">
                            Logistics / Shipping Required?
                        </label>

                        <div class="shipping-options">

                            <label class="shipping-option">

                                <input
                                    type="radio"
                                    name="shipping_required"
                                    value="yes"
                                >

                                <span>Yes</span>

                            </label>


                            <label class="shipping-option">

                                <input
                                    type="radio"
                                    name="shipping_required"
                                    value="no"
                                >

                                <span>No</span>

                            </label>

                        </div>

                    </div>


                    {{-- Search --}}
                    <div class="filter-search">

                        <button
                            type="submit"
                            class="buyer-search-btn"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search Buyers
                        </button>

                    </div>

                </div>

            </form>

        </div>


        {{-- Results --}}
        <div class="buyer-results-section">

            <div class="buyer-results-header">

                <div>

                    <span class="results-label">
                        SEARCH RESULTS
                    </span>

                    <h2>
                        Buyers interested in your products
                    </h2>

                </div>

                <span class="results-count">
                    18 Buyers Found
                </span>

            </div>


            {{-- Buyer Result --}}
            <div class="buyer-result-card">

                <div class="buyer-result-select">

                    <input
                        type="checkbox"
                        class="buyer-checkbox"
                        name="buyers[]"
                        value="1"
                    >

                </div>


                <div class="buyer-result-content">

                    <div class="buyer-result-top">

                        <div>

                            <h3>
                                ABC Trading LLC
                            </h3>

                            <p class="buyer-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Dubai, UAE

                            </p>

                        </div>


                        <span class="buyer-type">
                            Trading Company
                        </span>

                    </div>


                    {{-- Interested Products --}}
                    <div class="interested-products">

                        <span class="interested-label">
                            Interested in
                        </span>

                        <div class="interested-product-list">

                            <span class="interested-product">

                                <i class="fa-solid fa-check"></i>

                                Industrial Pumps

                            </span>


                            <span class="interested-product">

                                <i class="fa-solid fa-check"></i>

                                Compressors

                            </span>

                        </div>

                    </div>


                    <div class="buyer-result-bottom">

                        <span class="buyer-match">

                            <i class="fa-solid fa-circle-check"></i>

                            Strong Match

                        </span>


                        <a
                            href="#"
                            class="view-company-btn"
                        >
                            View Company

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Buyer Result --}}
            <div class="buyer-result-card">

                <div class="buyer-result-select">

                    <input
                        type="checkbox"
                        class="buyer-checkbox"
                        name="buyers[]"
                        value="2"
                    >

                </div>


                <div class="buyer-result-content">

                    <div class="buyer-result-top">

                        <div>

                            <h3>
                                Global Equipment Trading
                            </h3>

                            <p class="buyer-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Abu Dhabi, UAE

                            </p>

                        </div>


                        <span class="buyer-type">
                            Importer

                        </span>

                    </div>


                    <div class="interested-products">

                        <span class="interested-label">
                            Interested in
                        </span>

                        <div class="interested-product-list">

                            <span class="interested-product">

                                <i class="fa-solid fa-check"></i>

                                Industrial Pumps

                            </span>

                        </div>

                    </div>


                    <div class="buyer-result-bottom">

                        <span class="buyer-match">

                            <i class="fa-solid fa-circle-check"></i>

                            Good Match

                        </span>


                        <a
                            href="#"
                            class="view-company-btn"
                        >
                            View Company

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Send Inquiry --}}
            <div class="send-inquiry-wrapper">

                <div class="selected-buyer-info">

                    <i class="fa-solid fa-circle-info"></i>

                    <span>
                        Select one or more buyers to send an enquiry.
                    </span>

                </div>


                <button
                    type="button"
                    class="send-inquiry-btn"
                >
                    Send Inquiry

                    <i class="fa-solid fa-paper-plane"></i>

                </button>

            </div>

        </div>

    </div>

</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const addProductButton =
        document.getElementById('add-buyer-product');

    const productFields =
        document.getElementById('buyer-product-fields');


    // Add product
    addProductButton.addEventListener('click', function () {

        const productRow =
            document.createElement('div');

        productRow.classList.add('product-input-row');

        productRow.innerHTML = `
            <input
                type="text"
                name="products[]"
                class="form-control"
                placeholder="Type another product / keyword"
                required
            >

            <button
                type="button"
                class="remove-product"
                aria-label="Remove product"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;

        productFields.appendChild(productRow);

    });


    // Remove product
    productFields.addEventListener('click', function (event) {

        const removeButton =
            event.target.closest('.remove-product');

        if (!removeButton) {
            return;
        }

        removeButton
            .closest('.product-input-row')
            .remove();

    });

});
</script>

@endsection