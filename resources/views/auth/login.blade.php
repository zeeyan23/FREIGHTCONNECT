@extends('layouts.app')

@section('content')

<section class="auth-page">

    <div class="container">

        <div class="auth-wrapper">

            {{-- Left Side --}}
            <div class="auth-intro">

                <span class="auth-label">
                    FREIGHTCONNECT ACCOUNT
                </span>

                <h1>
                    Welcome <span>Back.</span>
                </h1>

                <p>
                    Sign in to manage your FreightConnect membership,
                    company profile, business connections and enquiries.
                </p>

                <div class="auth-features">

                    <div class="auth-feature">
                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>
                            <strong>Manage Your Company</strong>
                            <span>Keep your business information up to date.</span>
                        </div>
                    </div>

                    <div class="auth-feature">
                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>
                            <strong>Connect With Members</strong>
                            <span>Access relevant business opportunities.</span>
                        </div>
                    </div>

                    <div class="auth-feature">
                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <strong>Secure Account</strong>
                            <span>Manage your account and login credentials.</span>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Login Card --}}
            <div class="auth-card">

                <div class="auth-card-header">

                    <div class="auth-card-icon">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </div>

                    <div>
                        <h2>Sign In</h2>

                        <p>
                            Enter your account credentials to continue.
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


                    {{-- Password --}}
                    <div class="auth-form-group">

                        <div class="auth-label-row">

                            <label for="password">
                                Password
                                <span>*</span>
                            </label>

                            <a href="{{ route('forgot-password') }}">
                                Forgot password?
                            </a>

                        </div>

                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="auth-password-toggle"
                                onclick="togglePassword('password', this)"
                                aria-label="Show password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- Remember --}}
                    <div class="auth-options">

                        <label class="auth-checkbox">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                            >

                            <span>Remember me</span>

                        </label>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="auth-submit"
                    >
                        Sign In

                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>


                {{-- Register --}}
                <div class="auth-register">

                    <span>
                        Don't have a FreightConnect account?
                    </span>

                    <a href="{{ route('register') }}">
                        Create Free Account
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<script>
    function togglePassword(inputId, button) {

        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');

            button.setAttribute('aria-label', 'Hide password');

        } else {

            input.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

            button.setAttribute('aria-label', 'Show password');
        }
    }
</script>

@endsection

