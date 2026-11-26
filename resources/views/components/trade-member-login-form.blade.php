
<div class="trade-member-login-form">

    <form id="tradeMemberLoginForm" class="trade-member-login-form">

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

        <button type="submit" class="btn btn-primary w-100">
            Login
            <i class="fa-solid fa-arrow-right ms-2"></i>
        </button>

    </form>

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
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Backend authentication will be implemented later.
        });
    }
</script>