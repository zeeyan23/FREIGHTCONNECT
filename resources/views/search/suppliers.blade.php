@extends('layouts.app')

@section('content')

<section class="supplier-search-page">

    <div class="container">

        {{-- Page Header --}}
        <div class="supplier-search-header">

            <span class="search-label">
                FIND A SUPPLIER
            </span>

            <h1>
                Find the right suppliers
            </h1>

            <p>
                Search by product, country and your logistics requirements.
            </p>

        </div>


        {{-- Compact Search Filters --}}
        <div class="supplier-filter-bar">

            <form action="#" method="GET">

                <div class="supplier-filter-row">

                    {{-- Products --}}
                    <div class="filter-item filter-products">

                        <label class="search-form-label">
                            Product(s)
                        </label>

                        <div id="product-fields">

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
                            id="add-product"
                            class="add-product-btn"
                        >
                            <i class="fa-solid fa-plus"></i>
                            Add product
                        </button>

                    </div>


                    {{-- Country --}}
                    <div class="filter-item">

                        <label for="country" class="search-form-label">
                            Country
                        </label>

                        <select
                            name="country"
                            id="country"
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

                        <label for="quantity" class="search-form-label">
                            Quantity
                            <span>(Optional)</span>
                        </label>

                        <input
                            type="text"
                            name="quantity"
                            id="quantity"
                            class="form-control"
                            placeholder="e.g. 500 units"
                        >

                    </div>


                    {{-- Shipping --}}
                    <div class="filter-item filter-shipping">

                        <label class="search-form-label">
                            Shipping Required?
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
                            class="supplier-search-btn"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>
        


        {{-- Results --}}
        <div class="supplier-results-section">

            <div class="supplier-results-header">

                <div>
                    <span class="results-label">
                        SEARCH RESULTS
                    </span>

                    <h2>
                        Suppliers matching your requirements
                    </h2>
                </div>

                <span class="results-count">
                    24 Suppliers Found
                </span>

            </div>


            {{-- Result Card --}}
            <div class="supplier-result-card">

                <div class="supplier-result-select">

                    <input
                        type="checkbox"
                        class="supplier-checkbox"
                        name="suppliers[]"
                        value="1"
                    >

                </div>


                <div class="supplier-result-content">

                    <div class="supplier-result-top">

                        <div>

                            <h3>
                                ABC Trading LLC
                            </h3>

                            <p class="supplier-location">
                                <i class="fa-solid fa-location-dot"></i>
                                Dubai, UAE
                            </p>

                        </div>

                        <span class="supplier-type">
                            Trading Company
                        </span>

                    </div>


                    <div class="matched-products">

                        <span class="matched-label">
                            Matches your requirements
                        </span>

                        <div class="matched-product-list">

                            <span class="matched-product">
                                <i class="fa-solid fa-check"></i>
                                Industrial Pumps
                            </span>

                            <span class="matched-product">
                                <i class="fa-solid fa-check"></i>
                                Compressors
                            </span>

                        </div>

                    </div>


                    <div class="supplier-result-bottom">

                        <span class="supplier-match">
                            <i class="fa-solid fa-circle-check"></i>
                            Strong Match
                        </span>

                        <a href="#" class="view-company-btn">
                            View Company
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>


            {{-- Result Card --}}
            <div class="supplier-result-card">

                <div class="supplier-result-select">

                    <input
                        type="checkbox"
                        class="supplier-checkbox"
                        name="suppliers[]"
                        value="2"
                    >

                </div>


                <div class="supplier-result-content">

                    <div class="supplier-result-top">

                        <div>

                            <h3>
                                XYZ Industries
                            </h3>

                            <p class="supplier-location">
                                <i class="fa-solid fa-location-dot"></i>
                                Abu Dhabi, UAE
                            </p>

                        </div>

                        <span class="supplier-type">
                            Manufacturer
                        </span>

                    </div>


                    <div class="matched-products">

                        <span class="matched-label">
                            Matches your requirements
                        </span>

                        <div class="matched-product-list">

                            <span class="matched-product">
                                <i class="fa-solid fa-check"></i>
                                Industrial Pumps
                            </span>

                        </div>

                    </div>


                    <div class="supplier-result-bottom">

                        <span class="supplier-match">
                            <i class="fa-solid fa-circle-check"></i>
                            Good Match
                        </span>

                        <a href="#" class="view-company-btn">
                            View Company
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <div class="supplier-result-card">

                <div class="supplier-result-select">

                    <input
                        type="checkbox"
                        class="supplier-checkbox"
                        name="suppliers[]"
                        value="2"
                    >

                </div>


                <div class="supplier-result-content">

                    <div class="supplier-result-top">

                        <div>

                            <h3>
                                XYZ Industries
                            </h3>

                            <p class="supplier-location">
                                <i class="fa-solid fa-location-dot"></i>
                                Abu Dhabi, UAE
                            </p>

                        </div>

                        <span class="supplier-type">
                            Manufacturer
                        </span>

                    </div>


                    <div class="matched-products">

                        <span class="matched-label">
                            Matches your requirements
                        </span>

                        <div class="matched-product-list">

                            <span class="matched-product">
                                <i class="fa-solid fa-check"></i>
                                Industrial Pumps
                            </span>

                        </div>

                    </div>


                    <div class="supplier-result-bottom">

                        <span class="supplier-match">
                            <i class="fa-solid fa-circle-check"></i>
                            Good Match
                        </span>

                        <a href="#" class="view-company-btn">
                            View Company
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            <div class="supplier-result-card">

                <div class="supplier-result-select">

                    <input
                        type="checkbox"
                        class="supplier-checkbox"
                        name="suppliers[]"
                        value="2"
                    >

                </div>


                <div class="supplier-result-content">

                    <div class="supplier-result-top">

                        <div>

                            <h3>
                                XYZ Industries
                            </h3>

                            <p class="supplier-location">
                                <i class="fa-solid fa-location-dot"></i>
                                Abu Dhabi, UAE
                            </p>

                        </div>

                        <span class="supplier-type">
                            Manufacturer
                        </span>

                    </div>


                    <div class="matched-products">

                        <span class="matched-label">
                            Matches your requirements
                        </span>

                        <div class="matched-product-list">

                            <span class="matched-product">
                                <i class="fa-solid fa-check"></i>
                                Industrial Pumps
                            </span>

                        </div>

                    </div>


                    <div class="supplier-result-bottom">

                        <span class="supplier-match">
                            <i class="fa-solid fa-circle-check"></i>
                            Good Match
                        </span>

                        <a href="#" class="view-company-btn">
                            View Company
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- Send Inquiry --}}
            <div class="send-inquiry-wrapper">

                <div class="selected-supplier-info">

                    <i class="fa-solid fa-circle-info"></i>

                    <span>
                        Select one or more suppliers to send an enquiry.
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

    const addProductButton = document.getElementById('add-product');
    const productFields = document.getElementById('product-fields');


    // Add product
    addProductButton.addEventListener('click', function () {

        const productRow = document.createElement('div');

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