
<div class="trade-member-login-form">

    <form id="tradeMemberLoginForm"
      class="trade-member-login-form"
      action="{{ route('trade-member.login') }}"
      method="POST">

        @csrf

        <div class="mb-3">
            <label for="tradeMemberEmail" class="form-label">
                Business Email
            </label>

            <input type="email"
                class="form-control"
                id="tradeMemberEmail"
                name="email"
                placeholder="Enter your registered business email"
                autocomplete="username"
                required>
        </div>

        <div class="mb-3">
            <label for="tradeMemberPassword" class="form-label">
                Password
            </label>

            <div class="input-group">
                <input type="password"
                    class="form-control"
                    id="tradeMemberPassword"
                    name="password"
                    placeholder="Enter your FreightConnect password"
                    autocomplete="current-password"
                    required>

                <button class="btn btn-outline-secondary"
                        type="button"
                        id="toggleTradeMemberPassword"
                        aria-label="Show password">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </div>
        </div>


        <div class="form-check mb-3">
            <input
                class="form-check-input"
                type="checkbox"
                id="rememberTradeMemberDevice"
                name="remember"
                value="1"
            >

            <label class="form-check-label" for="rememberTradeMemberDevice">
                Remember this device (30 days)
            </label>
        </div>
        <div id="tradeMemberLoginMessage"
            class="alert d-none mb-3"
            role="alert"></div>
        <button type="submit" class="btn btn-primary w-100">
            Login
            <i class="fa-solid fa-arrow-right ms-2"></i>
        </button>

    </form>

    <div class="text-center mt-3">
        <button type="button"
            class="btn btn-link text-decoration-none"
            id="showTradeMemberActivation">
            First time here? Activate your account
        </button>
    </div>

    <div id="tradeMemberActivationSection" class="d-none">

        <form id="tradeMemberOtpRequestForm"
            action="{{ route('trade-member.request-otp') }}"
            method="POST">

            @csrf

            <div class="mb-3">
                <label for="tradeMemberActivationEmail" class="form-label">
                    Registered Business Email
                </label>

                <input type="email"
                    class="form-control"
                    id="tradeMemberActivationEmail"
                    name="email"
                    placeholder="Enter your registered business email"
                    required>
            </div>

            <div id="tradeMemberOtpRequestMessage"
                class="alert d-none mb-3"
                role="alert"></div>

            <button type="submit"
                class="btn btn-primary w-100"
                id="tradeMemberRequestOtpButton">
                Request OTP
                <i class="fa-solid fa-paper-plane ms-2"></i>
            </button>

        </form>

        <form id="tradeMemberOtpVerifyForm"
            action="{{ route('trade-member.verify-otp') }}"
            method="POST"
            class="d-none">

            @csrf

            <input type="hidden" name="email" id="tradeMemberOtpVerifyEmail">

            <div class="mb-3">
                <label for="tradeMemberOtp" class="form-label">
                    Enter the 6-digit OTP
                </label>

                <input type="text"
                    class="form-control"
                    id="tradeMemberOtp"
                    name="otp"
                    placeholder="Enter OTP"
                    inputmode="numeric"
                    maxlength="6"
                    pattern="[0-9]{6}"
                    required>
            </div>

            <div id="tradeMemberOtpVerifyMessage"
                class="alert d-none mb-3"
                role="alert"></div>

            <button type="submit"
                class="btn btn-primary w-100"
                id="tradeMemberVerifyOtpButton">
                Verify OTP
                <i class="fa-solid fa-check ms-2"></i>
            </button>

        </form>

        <div id="tradeMemberActivationResult"
            class="alert d-none mt-3"
            role="alert"></div>

    </div>

</div>

<script>
    const passwordInput = document.getElementById(
        'tradeMemberPassword'
    );

    const togglePassword = document.getElementById(
        'toggleTradeMemberPassword'
    );

    if (togglePassword && passwordInput) {

        togglePassword.addEventListener('click', function () {

            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword
                ? '<i class="fa-solid fa-eye-slash"></i>'
                : '<i class="fa-solid fa-eye"></i>';

        });

    }

    const loginForm = document.getElementById(
        'tradeMemberLoginForm'
    );

    if (loginForm) {
        loginForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const messageBox = document.getElementById(
                'tradeMemberLoginMessage'
            );

            const submitButton = loginForm.querySelector(
                'button[type="submit"]'
            );

            messageBox.className = 'alert d-none mb-3';
            messageBox.textContent = '';

            submitButton.disabled = true;
            submitButton.innerHTML = 'Logging in...';

            try {
                const response = await fetch(loginForm.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new FormData(loginForm),
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(
                        result.message || 'Unable to log in. Please try again.'
                    );
                }

                // Reload the current page after successful login.
                window.location.reload();

            } catch (error) {
                messageBox.className = 'alert alert-danger mb-3';
                messageBox.textContent = error.message;

                submitButton.disabled = false;
                submitButton.innerHTML =
                    'Login <i class="fa-solid fa-arrow-right ms-2"></i>';
            }
        });

        // Show the first-time activation section.
        const showActivationButton = document.getElementById(
            'showTradeMemberActivation'
        );

        const activationSection = document.getElementById(
            'tradeMemberActivationSection'
        );

        if (showActivationButton && activationSection) {
            showActivationButton.addEventListener('click', function () {

                const loginForm = document.getElementById(
                    'tradeMemberLoginForm'
                );

                const loginButton = document.getElementById(
                    'showTradeMemberActivation'
                );

                loginForm.classList.add('d-none');
                loginButton.classList.add('d-none');

                activationSection.classList.remove('d-none');

            });
        }


        // Request OTP.
        const otpRequestForm = document.getElementById(
            'tradeMemberOtpRequestForm'
        );

        if (otpRequestForm) {
            otpRequestForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                const messageBox = document.getElementById(
                    'tradeMemberOtpRequestMessage'
                );

                const submitButton = document.getElementById(
                    'tradeMemberRequestOtpButton'
                );

                const email = document.getElementById(
                    'tradeMemberActivationEmail'
                ).value.trim();

                messageBox.className = 'alert d-none mb-3';
                messageBox.textContent = '';

                submitButton.disabled = true;
                submitButton.textContent = 'Sending OTP...';

                try {
                    const response = await fetch(otpRequestForm.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new FormData(otpRequestForm),
                        credentials: 'same-origin'
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        throw new Error(
                            result.message || 'Unable to send OTP. Please try again.'
                        );
                    }

                    document.getElementById('tradeMemberOtpVerifyEmail').value = email;
                    otpRequestForm.classList.add('d-none');
                    document.getElementById('tradeMemberOtpVerifyForm').classList.remove('d-none');
                    const activationResult = document.getElementById(
                        'tradeMemberActivationResult'
                    );

                    activationResult.className = 'alert alert-success mt-3';
                    activationResult.textContent = result.message;

                } catch (error) {
                    messageBox.className = 'alert alert-danger mb-3';
                    messageBox.textContent = error.message;

                } finally {
                    submitButton.disabled = false;
                    submitButton.innerHTML =
                        'Request OTP <i class="fa-solid fa-paper-plane ms-2"></i>';
                }
            });
        }

        // Verify OTP and activate the Trade Member account.
        const otpVerifyForm = document.getElementById(
            'tradeMemberOtpVerifyForm'
        );

        if (otpVerifyForm) {
            otpVerifyForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                const messageBox = document.getElementById(
                    'tradeMemberOtpVerifyMessage'
                );

                const submitButton = document.getElementById(
                    'tradeMemberVerifyOtpButton'
                );

                messageBox.className = 'alert d-none mb-3';
                messageBox.textContent = '';

                submitButton.disabled = true;
                submitButton.textContent = 'Verifying OTP...';

                try {
                    const response = await fetch(otpVerifyForm.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new FormData(otpVerifyForm),
                        credentials: 'same-origin'
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        throw new Error(
                            result.message || 'OTP verification failed. Please try again.'
                        );
                    }

                    // Hide the OTP verification form
                    otpVerifyForm.classList.add('d-none');

                    // Hide the entire activation section
                    document.getElementById('tradeMemberActivationSection')
                        .classList.add('d-none');

                    // Show the normal login form
                    const loginForm = document.getElementById('tradeMemberLoginForm');
                    loginForm.classList.remove('d-none');

                    // Automatically fill the verified email
                    document.getElementById('tradeMemberEmail').value =
                        document.getElementById('tradeMemberActivationEmail').value.trim();

                    // Display the success message in the login form
                    const loginMessage = document.getElementById('tradeMemberLoginMessage');

                    loginMessage.className = 'alert alert-success mb-3';
                    loginMessage.textContent =
                        'Email verified successfully. Your login password has been sent to your registered email.';

                    // Focus the password field
                    document.getElementById('tradeMemberPassword').focus();

                } catch (error) {
                    messageBox.className = 'alert alert-danger mb-3';
                    messageBox.textContent = error.message;

                } finally {
                    submitButton.disabled = false;
                    submitButton.innerHTML =
                        'Verify OTP <i class="fa-solid fa-check ms-2"></i>';
                }
            });
        }
    }
</script>