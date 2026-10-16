<!DOCTYPE html>

<html lang="en">

<head>
    <title>FREIGHTCONNECT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/css/intlTelInput.css"/>

<link rel="stylesheet" href="{{ asset('css/sections/about.css') }}?v={{ filemtime(public_path('css/sections/about.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/contact.css') }}?v={{ filemtime(public_path('css/sections/contact.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/faq.css') }}?v={{ filemtime(public_path('css/sections/faq.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/footer.css') }}?v={{ filemtime(public_path('css/sections/footer.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/hero.css') }}?v={{ filemtime(public_path('css/sections/hero.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/membership.css') }}?v={{ filemtime(public_path('css/sections/membership.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/navbar.css') }}?v={{ filemtime(public_path('css/sections/navbar.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/why-join.css') }}?v={{ filemtime(public_path('css/sections/why-join.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/opportunities.css') }}?v={{ filemtime(public_path('css/sections/opportunities.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/how-it-works.css') }}?v={{ filemtime(public_path('css/sections/how-it-works.css')) }}">
<link rel="stylesheet" href="{{ asset('css/sections/insights.css') }}?v={{ filemtime(public_path('css/sections/insights.css')) }}">

<link rel="stylesheet" href="{{ asset('css/floating-whatsapp.css') }}?v={{ filemtime(public_path('css/floating-whatsapp.css')) }}">
<link rel="stylesheet" href="{{ asset('css/membership/trade-partner.css') }}?v={{ filemtime(public_path('css/membership/trade-partner.css')) }}">
<link rel="stylesheet" href="{{ asset('css/membership/freight-forwarding.css') }}?v={{ filemtime(public_path('css/membership/freight-forwarding.css')) }}">
<link rel="stylesheet" href="{{ asset('css/components/selection-modal.css') }}?v={{ filemtime(public_path('css/components/selection-modal.css')) }}">

<link rel="stylesheet" href="{{ asset('css/search/suppliers.css') }}?v={{ filemtime(public_path('css/search/suppliers.css')) }}">
<link rel="stylesheet" href="{{ asset('css/search/buyers.css') }}?v={{ filemtime(public_path('css/search/buyers.css')) }}">
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}?v={{ filemtime(public_path('css/auth/register.css')) }}">
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}?v={{ filemtime(public_path('css/auth/login.css')) }}">
<link rel="stylesheet" href="{{ asset('css/account/account.css') }}?v={{ filemtime(public_path('css/account/account.css')) }}">

<link rel="stylesheet" href="{{ asset('css/legal/legal.css') }}?v={{ filemtime(public_path('css/legal/legal.css')) }}">


</head>

<body>


@yield('content')

{{-- Floating WhatsApp Button --}}
@if (
!request()->routeIs(
    'membership.trade-partner',
    'membership.freight-forwarding',
    'search.buyers',
    'search.suppliers',
    'freightconnect.register',
    'legal.external-terms',
    'legal.external-privacy',
    'legal.payment-recovery',
    'legal.membership-terms',
    'legal.privacy-policy',
    'login',
    'forgot-password',
    'reset-password',
    'account'
))
<a href="https://wa.me/971XXXXXXXXX"
    class="whatsapp-float"
    target="_blank"
    aria-label="Chat with us on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
</a>
@endif

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/intlTelInput.min.js"></script>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const container = document.querySelector('.crane-image-container');

    if (!container) return;

    const faq = document.querySelector('.faq-section');
    const insights = document.querySelector('.news-section');
    const truckSection = document.querySelector('.footer-truck-section');

    const maskBases = document.querySelectorAll('.mask-base');

    // Smooth scrolling state
    let currentY = 0;
    let targetY = 0;

    // Intro animation state
    let introOffsetY = -100;
    let startTime = null;

    const introDuration = 1200;

    // Cache mask overlays
    const masks = [];

    maskBases.forEach(function (base) {
        const overlay = base.parentElement.querySelector('.mask-overlay');

        if (overlay) {
            masks.push({ base, overlay });
        }
    });

    // Calculate the crane's target position on scroll.
    function updateContainerOnScroll() {

        const scrollStart = 50;

        const maxScroll = Math.max(
            1,
            document.documentElement.scrollHeight -
            window.innerHeight -
            scrollStart
        );

        const scrollProgress = Math.max(
            0,
            Math.min(
                1,
                (window.scrollY - scrollStart) / maxScroll
            )
        );

        targetY = scrollProgress * maxScroll;
    }

    window.addEventListener(
        'scroll',
        updateContainerOnScroll,
        { passive: true }
    );

    window.addEventListener(
        'resize',
        updateContainerOnScroll,
        { passive: true }
    );

    // Update text masking without creating separate animation loops.
    function updateMasks() {

        const imageRect = container.getBoundingClientRect();

        masks.forEach(function ({ base, overlay }) {

            const textRect = base.getBoundingClientRect();

            const left = Math.max(textRect.left, imageRect.left);
            const right = Math.min(textRect.right, imageRect.right);
            const top = Math.max(textRect.top, imageRect.top);
            const bottom = Math.min(textRect.bottom, imageRect.bottom);

            if (left >= right || top >= bottom) {
                overlay.style.clipPath = 'inset(0 0 100% 0)';
                return;
            }

            const clipTop = top - textRect.top;
            const clipRight = textRect.right - right;
            const clipBottom = textRect.bottom - bottom;
            const clipLeft = left - textRect.left;

            overlay.style.clipPath =
                `inset(${clipTop}px ${clipRight}px ${clipBottom}px ${clipLeft}px)`;
        });
    }

    // Main animation loop
    let previousTime = 0;

    function animate(timestamp) {

        const deltaTime = previousTime
            ? Math.min(timestamp - previousTime, 50)
            : 16.67;

        previousTime = timestamp;

        // Intro animation
        if (startTime === null) {
            startTime = timestamp;
        }

        const elapsed = timestamp - startTime;

        let introProgress = Math.min(
            elapsed / introDuration,
            1
        );

        // Ease-out cubic
        introProgress = 1 - Math.pow(1 - introProgress, 3);

        introOffsetY = -100 * (1 - introProgress);

        container.style.opacity = introProgress;

        // Frame-rate-independent smooth scrolling.
        // Higher 0.12 = faster response; lower 0.06 = smoother/slower.
        const smoothing = 1 - Math.pow(
            1 - 0.12,
            deltaTime / 16.67
        );

        currentY += (targetY - currentY) * smoothing;

        // Avoid tiny residual movement when nearly at the target.
        if (Math.abs(targetY - currentY) < 0.05) {
            currentY = targetY;
        }

        // Default styling
        let xOffset = 0;
        let extraY = 0;
        let footerScale = 1;

        container.style.zIndex = '20';

        // FAQ layering
        if (faq) {
            const faqTop = faq.getBoundingClientRect().top;

            if (
                faqTop <= window.innerHeight &&
                faqTop > -faq.offsetHeight
            ) {
                container.style.zIndex = 'auto';
            }
        }

        // News layering
        if (insights) {
            const insightsTop = insights.getBoundingClientRect().top;

            if (insightsTop <= 400) {
                container.style.zIndex = 'auto';
            }
        }

        // Footer truck animation
        if (truckSection) {

            const truckImage = truckSection.querySelector('img');

            if (truckImage) {

                const truckTop =
                    truckImage.getBoundingClientRect().top;

                const progress = Math.max(
                    0,
                    Math.min(
                        1,
                        (window.innerHeight - truckTop) / 300
                    )
                );

                extraY = 160 * progress;
                xOffset = -80 * progress;
                footerScale = 1 - (0.20 * progress);
            }
        }

        // Apply the transform once per frame.
        container.style.transform =
            `translate3d(calc(-50% + ${xOffset}px), ${currentY + introOffsetY + extraY}px, 0) scale(${footerScale})`;

        // Keep masks synchronized with the crane.
        updateMasks();

        requestAnimationFrame(animate);
    }

    updateContainerOnScroll();
    requestAnimationFrame(animate);

});
</script>

</body>



</html>
