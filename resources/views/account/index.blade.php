```blade
@extends('layouts.app')

@section('content')

<section class="account-page">

    <div class="container">

        {{-- Page Header --}}
        <div class="account-header">

            <div>
                <span class="account-label">
                    FREIGHTCONNECT ACCOUNT
                </span>

                <h1>
                    Account <span>Dashboard</span>
                </h1>

                <p>
                    Manage your company information, contact details and
                    account credentials from one place.
                </p>
            </div>

            <a href="{{ route('login') }}" class="account-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </a>

        </div>


        <div class="account-layout">

            {{-- Sidebar --}}
            <aside class="account-sidebar">

                <div class="account-sidebar-card">

                    <div class="account-user">

                        <div class="account-user-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>
                            <strong>Your Company</strong>
                            <span>Member Account</span>
                        </div>

                    </div>


                    <nav class="account-navigation">

                        <a href="#overview" class="active">
                            <i class="fa-solid fa-chart-pie"></i>
                            <span>Account Overview</span>
                        </a>

                        <a href="#company">
                            <i class="fa-solid fa-building"></i>
                            <span>Company Details</span>
                        </a>

                        <a href="#contact">
                            <i class="fa-solid fa-address-card"></i>
                            <span>Contact Details</span>
                        </a>

                        <a href="#credentials">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Security & Credentials</span>
                        </a>

                        <div class="account-nav-divider"></div>

                        <a href="{{ route('login') }}" class="account-nav-logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>

                    </nav>

                </div>

            </aside>


            {{-- Main Content --}}
            <main class="account-content">


                {{-- Overview --}}
                <section class="account-section" id="overview">

                    <div class="account-section-header">

                        <div>
                            <span class="account-section-label">
                                OVERVIEW
                            </span>

                            <h2>Account Overview</h2>

                            <p>
                                Review your current FreightConnect account information.
                            </p>
                        </div>

                    </div>


                    <div class="account-overview-grid">

                        <div class="account-stat-card">

                            <div class="account-stat-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>

                            <div>
                                <span>Company</span>
                                <strong>Your Company</strong>
                            </div>

                        </div>


                        <div class="account-stat-card">

                            <div class="account-stat-icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>

                            <div>
                                <span>Business Type</span>
                                <strong>Exporter / Seller</strong>
                            </div>

                        </div>


                        <div class="account-stat-card">

                            <div class="account-stat-icon">
                                <i class="fa-solid fa-globe"></i>
                            </div>

                            <div>
                                <span>Country</span>
                                <strong>United Arab Emirates</strong>
                            </div>

                        </div>


                        <div class="account-stat-card">

                            <div class="account-stat-icon">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>

                            <div>
                                <span>Account Status</span>
                                <strong class="account-status">
                                    Active
                                </strong>
                            </div>

                        </div>

                    </div>

                </section>


                {{-- Company Details --}}
                <section class="account-section" id="company">

                    <div class="account-section-header account-section-header-row">

                        <div>
                            <span class="account-section-label">
                                BUSINESS INFORMATION
                            </span>

                            <h2>Company Details</h2>

                            <p>
                                Information about your registered business.
                            </p>
                        </div>

                        <button type="button" class="account-edit-btn">
                            <i class="fa-solid fa-pen"></i>
                            Edit Details
                        </button>

                    </div>


                    <div class="account-details-card">

                        <div class="account-detail">

                            <span>Company Name</span>

                            <strong>
                                Your Company Name
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Website</span>

                            <strong>
                                www.example.com
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Country</span>

                            <strong>
                                United Arab Emirates
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Business Type</span>

                            <strong>
                                Exporter / Seller
                            </strong>

                        </div>


                        <div class="account-detail account-detail-full">

                            <span>Product Categories</span>

                            <div class="account-tags">

                                <span>Machinery & Equipment</span>
                                <span>Automotive & Parts</span>
                                <span>Electronics & Electrical</span>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- Contact Details --}}
                <section class="account-section" id="contact">

                    <div class="account-section-header account-section-header-row">

                        <div>
                            <span class="account-section-label">
                                CONTACT INFORMATION
                            </span>

                            <h2>Contact Details</h2>

                            <p>
                                Manage the contact information associated with your company.
                            </p>
                        </div>

                        <button type="button" class="account-edit-btn">
                            <i class="fa-solid fa-pen"></i>
                            Edit Details
                        </button>

                    </div>


                    <div class="account-details-card">

                        <div class="account-detail">

                            <span>Contact Person</span>

                            <strong>
                                John Doe
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Contact Email</span>

                            <strong>
                                contact@example.com
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Phone</span>

                            <strong>
                                +971 50 000 0000
                            </strong>

                        </div>


                        <div class="account-detail">

                            <span>Account Email</span>

                            <strong>
                                account@example.com
                            </strong>

                        </div>

                    </div>

                </section>


                {{-- Security --}}
                <section class="account-section" id="credentials">

                    <div class="account-section-header">

                        <div>
                            <span class="account-section-label">
                                ACCOUNT SECURITY
                            </span>

                            <h2>Security & Credentials</h2>

                            <p>
                                Manage your password and account login email.
                            </p>
                        </div>

                    </div>


                    <div class="account-security-grid">

                        {{-- Change Password --}}
                        <div class="account-security-card">

                            <div class="account-security-icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <div class="account-security-content">

                                <h3>Change Password</h3>

                                <p>
                                    Update your current password to keep your
                                    account secure.
                                </p>

                                <a href="#" class="account-security-btn">
                                    Change Password
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </div>


                        {{-- Change Email --}}
                        <div class="account-security-card">

                            <div class="account-security-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="account-security-content">

                                <h3>Change Account Email</h3>

                                <p>
                                    Change the email address used to sign in
                                    to your FreightConnect account.
                                </p>

                                <a href="#" class="account-security-btn">
                                    Change Email
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </section>


            </main>

        </div>

    </div>

</section>

@endsection
```
