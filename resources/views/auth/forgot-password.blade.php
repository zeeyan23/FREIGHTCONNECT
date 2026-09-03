```blade id="7p4k2m"
@extends('layouts.app')

@section('content')

<section class="auth-page">

    <div class="container">

        <div class="auth-wrapper">

            {{-- Left Side --}}
            <div class="auth-intro">

                <span class="auth-label">
                    ACCOUNT RECOVERY
                </span>

                <h1>
                    Reset Your <span>Password.</span>
                </h1>

                <p>
                    No worries. Enter the email address associated with your
                    FreightConnect account and we'll help you regain access.
                </p>

                <div class="auth-features">

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                        </div>

                        <div>
                            <strong>Secure Recovery</strong>
                            <span>
                                We'll send recovery instructions to your account email.
                            </span>
                        </div>

                    </div>

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-link"></i>
                        </div>

                        <div>
                            <strong>One-Time Reset Link</strong>
                            <span>
                                Use the secure link to create a new password.
                            </span>
                        </div>

                    </div>

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <strong>Your Account Stays Protected</strong>
                            <span>
                                Your existing password remains unchanged until reset.
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Forgot Password Card --}}
            <div class="auth-card">

                <div class="auth-card-header">

                    <div class="auth-card-icon">
                        <i class="fa-solid fa-key"></i>
                    </div>

                    <div>
                        <h2>Forgot Password?</h2>

                        <p>
                            Enter your account email to continue.
                        </p>
                    </div>

                </div>


                <form action="#" method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="auth-form-group">

                        <label for="email">
                            Account Email
                            <span>*</span>
                        </label>

                        <div class="auth-input-wrapper">

                            <i class="fa-regular fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your account email"
                                autocomplete="email"
                                required
                            >

                        </div>

                    </div>


                    {{-- Information --}}
                    <div class="auth-info-box">

                        <i class="fa-solid fa-circle-info"></i>

                        <p>
                            If an account exists with this email address,
                            we'll send instructions to reset your password.
                        </p>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="auth-submit"
                    >
                        Send Reset Link
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>


                {{-- Back to Login --}}
                <div class="auth-register">

                    <span>
                        Remember your password?
                    </span>

                    <a href="{{ route('login') }}">
                        Back to Login
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
```
