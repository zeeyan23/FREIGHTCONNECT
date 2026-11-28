
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('guestEmailVerificationModal');

    if (!modal) return;

    const requestUrl = modal.dataset.requestUrl;
    const verifyUrl = modal.dataset.verifyUrl;

    const emailDisplay = document.getElementById('guestVerificationEmail');
    const otpBoxes = [...document.querySelectorAll('.guest-otp-box')];

    const message = document.getElementById('guestOtpMessage');
    const verifyBtn = document.getElementById('verifyGuestEmailOtp');
    const resendBtn = document.getElementById('resendGuestEmailOtp');

    const countdownDisplay = document.getElementById('guestOtpCountdown');
    const closeBtn = document.getElementById('closeGuestEmailVerification');

    let currentEmail = '';
    let currentInput = null;
    let currentTrigger = null;
    let countdownTimer = null;
    let isVerified = false;

    const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
    )?.content;

    // Modal controls
    function openModal() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';

        clearInterval(countdownTimer);
    }

    closeBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    // Messages
    function showMessage(text, type = '') {
        message.textContent = text;
        message.className = 'guest-otp-message';

        if (type) {
            message.classList.add(type);
        }
    }

    // Reset OTP boxes
    function resetOtpBoxes() {
        otpBoxes.forEach(box => box.value = '');
        otpBoxes[0].focus();
    }

    function getOtp() {
        return otpBoxes.map(box => box.value).join('');
    }

    // Countdown
    function startCountdown() {

        clearInterval(countdownTimer);

        let seconds = 60;

        resendBtn.disabled = true;
        countdownDisplay.textContent = seconds;

        countdownTimer = setInterval(() => {

            seconds--;

            countdownDisplay.textContent = seconds;

            if (seconds <= 0) {

                clearInterval(countdownTimer);

                resendBtn.disabled = false;
                resendBtn.textContent = 'Resend Code';
            }

        }, 1000);

        resendBtn.innerHTML =
            'Resend in <span id="guestOtpCountdown">60</span>s';
    }

    // API request
    async function sendRequest(url, payload) {

        const response = await fetch(url, {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },

            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Something went wrong.');
        }

        return data;
    }

    // Request OTP
    async function sendOtp(isResend = false) {

        try {

            resendBtn.disabled = true;

            if (isResend) {
                showMessage('Sending a new verification code...');
            }

            const data = await sendRequest(requestUrl, {
                email: currentEmail
            });

            showMessage(data.message, 'success');

            resetOtpBoxes();
            startCountdown();

        } catch (error) {

            showMessage(error.message, 'error');

            if (isResend) {
                resendBtn.disabled = false;
            }
        }
    }

    // Verification trigger for Buyer and Seller
    document.addEventListener('click', function (e) {

        const trigger = e.target.closest('.verify-business-email');

        if (!trigger) return;

        e.preventDefault();

        const form = trigger.closest('form');

        if (!form) return;

        const emailInput = form.querySelector(
            '[name="business_email"]'
        );

        if (!emailInput) return;

        const email = emailInput.value.trim().toLowerCase();

        if (!email) {
            alert('Please enter your business email first.');
            emailInput.focus();
            return;
        }

        if (!emailInput.checkValidity()) {
            emailInput.reportValidity();
            return;
        }

        currentInput = emailInput;
        currentTrigger = trigger;
        currentEmail = email;

        isVerified = false;

        emailDisplay.textContent = currentEmail;

        resetOtpBoxes();

        showMessage('Sending verification code...');

        openModal();

        sendOtp();
    });

    // OTP input navigation
    otpBoxes.forEach((box, index) => {

        box.addEventListener('input', function () {

            this.value = this.value.replace(/\D/g, '').slice(-1);

            if (this.value && index < otpBoxes.length - 1) {
                otpBoxes[index + 1].focus();
            }

        });

        box.addEventListener('keydown', function (e) {

            if (e.key === 'Backspace' && !this.value && index > 0) {
                otpBoxes[index - 1].focus();
            }

        });

        box.addEventListener('paste', function (e) {

            e.preventDefault();

            const pasted = e.clipboardData
                .getData('text')
                .replace(/\D/g, '')
                .slice(0, 6);

            otpBoxes.forEach((input, i) => {
                input.value = pasted[i] || '';
            });

            otpBoxes[Math.min(pasted.length, 5)].focus();

        });

    });

    // Verify OTP
    verifyBtn.addEventListener('click', async function () {

        const otp = getOtp();

        if (!/^\d{6}$/.test(otp)) {
            showMessage('Please enter the complete six-digit code.', 'error');
            return;
        }

        verifyBtn.disabled = true;
        verifyBtn.textContent = 'Verifying...';

        try {

            const data = await sendRequest(verifyUrl, {
                email: currentEmail,
                otp: otp
            });

            isVerified = true;

            currentInput.dataset.verifiedEmail = currentEmail;

            currentInput.classList.add('is-valid');

            currentTrigger.textContent = 'Email verified ✓';
            currentTrigger.classList.add('text-success');

            showMessage(data.message, 'success');

            setTimeout(closeModal, 1000);

        } catch (error) {

            showMessage(error.message, 'error');

        } finally {

            verifyBtn.disabled = false;
            verifyBtn.textContent = 'Verify Email';

        }

    });

    // Resend OTP
    resendBtn.addEventListener('click', function () {

        if (resendBtn.disabled) return;

        sendOtp(true);

    });

    // Reset frontend verification if email changes
    document.addEventListener('input', function (e) {

        if (!e.target.matches('[name="business_email"]')) return;

        if (e.target.dataset.verifiedEmail) {

            delete e.target.dataset.verifiedEmail;

            e.target.classList.remove('is-valid');

            const form = e.target.closest('form');

            const trigger = form?.querySelector('.verify-business-email');

            if (trigger) {
                trigger.textContent = 'email here.';
                trigger.classList.remove('text-success');
            }

        }

    });

});
