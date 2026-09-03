```blade
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
                    Create a <span>New Password.</span>
                </h1>

                <p>
                    Set a new password for your FreightConnect account.
                    Choose a strong password that you can remember.
                </p>

                <div class="auth-features">

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <div>
                            <strong>Secure Password</strong>
                            <span>
                                Create a strong password to protect your account.
                            </span>
                        </div>

                    </div>

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <strong>Protected Account</strong>
                            <span>
                                Your new password will replace your previous password.
                            </span>
                        </div>

                    </div>

                    <div class="auth-feature">

                        <div class="auth-feature-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <div>
                            <strong>Ready to Sign In</strong>
                            <span>
                                After resetting your password, you can sign in again.
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Reset Password Card --}}
            <div class="auth-card">

                <div class="auth-card-header">

                    <div class="auth-card-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div>
                        <h2>Reset Password</h2>

                        <p>
                            Enter and confirm your new password.
                        </p>
                    </div>

                </div>


                <form action="#" method="POST">

                    @csrf

                    {{-- New Password --}}
                    <div class="auth-form-group">

                        <label for="password">
                            New Password
                            <span>*</span>
                        </label>

                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your new password"
                                autocomplete="new-password"
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


                    {{-- Confirm Password --}}
                    <div class="auth-form-group">

                        <label for="password_confirmation">
                            Confirm New Password
                            <span>*</span>
                        </label>

                        <div class="auth-input-wrapper">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Confirm your new password"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                type="button"
                                class="auth-password-toggle"
                                onclick="togglePassword('password_confirmation', this)"
                                aria-label="Show password"
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- Password Note --}}
                    <div class="auth-info-box">

                        <i class="fa-solid fa-circle-info"></i>

                        <p>
                            Use a strong password and avoid using passwords
                            that you use for other accounts.
                        </p>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="auth-submit"
                    >
                        Reset Password
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>


                {{-- Back to Login --}}
                <div class="auth-register">

                    <span>
                        Already reset your password?
                    </span>

                    <a href="{{ route('login') }}">
                        Back to Login
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
```
