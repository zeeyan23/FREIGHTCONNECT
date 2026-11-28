
<div class="guest-email-verification-overlay" id="guestEmailVerificationModal" data-request-url="{{ route('guest.email.request-otp') }}"
     data-verify-url="{{ route('guest.email.verify-otp') }}">

    <div class="guest-email-verification-card">

        <button type="button"
                class="guest-email-close"
                id="closeGuestEmailVerification">
            &times;
        </button>

        <div class="guest-email-icon">
            <i class="fa-regular fa-envelope"></i>
        </div>

        <h4>Verify Your Email</h4>

        <p class="guest-email-description">
            We've sent a verification code to
        </p>

        <p class="guest-email-address" id="guestVerificationEmail">
            name@company.com
        </p>

        <div class="guest-otp-inputs" id="guestOtpInputs">

            @for($i = 0; $i < 6; $i++)
                <input
                    type="text"
                    class="guest-otp-box"
                    maxlength="1"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                >
            @endfor

        </div>

        <div class="guest-otp-message"
             id="guestOtpMessage"></div>

        <button type="button"
                class="guest-verify-button"
                id="verifyGuestEmailOtp">
            Verify Email
        </button>

        <div class="guest-resend-section">
            Didn't receive the code?

            <button type="button"
                    id="resendGuestEmailOtp"
                    disabled>
                Resend in <span id="guestOtpCountdown">60</span>s
            </button>
        </div>

        <div class="guest-email-security">
            <i class="fa-solid fa-shield-halved"></i>
            Your email verification is secure.
        </div>

    </div>

</div>
