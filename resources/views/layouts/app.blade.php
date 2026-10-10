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

    let currentY = -100;
    let targetY = -100;

    let startTime = null;

    function loadAnimation(timestamp) {

        if (!startTime) {
            startTime = timestamp;
        }

        const elapsed = timestamp - startTime;
        const duration = 1200;

        let progress = Math.min(elapsed / duration, 1);

        // Ease out
        progress = 1 - Math.pow(1 - progress, 3);

        currentY = -100 + (100 * progress);

        container.style.opacity = progress;

        if (progress < 1) {
            requestAnimationFrame(loadAnimation);
        }
    }

    requestAnimationFrame(loadAnimation);

    function updateContainerOnScroll() {

        const scrollY = window.scrollY;
        const scrollStart = 100;
        const documentHeight =
            document.documentElement.scrollHeight;
        const scrollDistance =
            documentHeight - window.innerHeight - scrollStart;
        let progress =
            (scrollY - scrollStart) / scrollDistance;
        progress =
            Math.max(0, Math.min(1, progress));
        targetY =
            progress * scrollDistance;
    }

    window.addEventListener(
        'scroll',
        updateContainerOnScroll,
        { passive: true }
    );

    let truckLanding = null;
    let truckLandingProgress = 0;

    function smoothMovement() {

        currentY +=
            (targetY - currentY) * 0.08;

        const membership =
            document.querySelector('.membership-section');

        let scale = 1;
        let xOffset = 0;

        if (membership) {

            const membershipTop =
                membership.getBoundingClientRect().top;

            const membershipHeight =
                membership.offsetHeight;

            /*
            * Membership enters the viewport
            */
            const enterStart = 400;
            const enterEnd = 0;

            /*
            * Membership leaves the viewport
            */
            const exitStart = -membershipHeight;
            const exitEnd = -membershipHeight - 100;

            /*
            * =========================
            * ENTER MEMBERSHIP
            * =========================
            */

            let enterProgress =
                (enterStart - membershipTop) /
                (enterStart - enterEnd);

            enterProgress =
                Math.max(0, Math.min(1, enterProgress));


            /*
            * =========================
            * EXIT MEMBERSHIP
            * =========================
            */

            let exitProgress =
                (exitStart - membershipTop) /
                (exitStart - exitEnd);

            exitProgress =
                Math.max(0, Math.min(1, exitProgress));


            /*
            * =========================
            * SCALE
            * =========================
            */

            const normalScale = 1;
            const membershipScale = 0.40;

            if (enterProgress > 0 && exitProgress === 0) {

                // Shrink while entering Membership
                scale =
                    normalScale -
                    (
                        (normalScale - membershipScale)
                        * enterProgress
                    );

            } else if (exitProgress > 0) {

                // Grow back after Membership
                scale =
                    membershipScale +
                    (
                        (normalScale - membershipScale)
                        * exitProgress
                    );

            } else {

                scale = normalScale;
            }


            /*
            * =========================
            * HORIZONTAL POSITION
            * =========================
            */

            const membershipOffset = -150;

            if (enterProgress > 0 && exitProgress === 0) {

                // Move left while entering
                xOffset =
                    membershipOffset * enterProgress;

            } else if (exitProgress > 0) {

                // Return to center while leaving
                xOffset =
                    membershipOffset *
                    (1 - exitProgress);

            } else {

                xOffset = 0;
            }
        }

            const faq = document.querySelector('.faq-section');
            const insights = document.querySelector('.news-section');

            container.style.zIndex = '20';

            if (faq) {
                const faqTop = faq.getBoundingClientRect().top;

                if (faqTop <= window.innerHeight && faqTop > -faq.offsetHeight) {
                    container.style.zIndex = 'auto';
                }
            }

            if (insights) {
                const insightsTop = insights.getBoundingClientRect().top;

                if (insightsTop <= 400) {
                    container.style.zIndex = 'auto';
                }
            }
            
            const truckSection = document.querySelector('.footer-truck-section');

            let footerOffsetX = 0;
            let extraY = 0;
            let footerScale = 100;

            if (truckSection) {
                const truckImage = truckSection.querySelector('img');

                if (truckImage) {
                    const truckTop = truckImage.getBoundingClientRect().top;

                    const progress = Math.max(
                        0,
                        Math.min(1, (window.innerHeight - truckTop) / 300)
                    );

                    extraY = 160 * progress;
                    footerOffsetX = -80 * progress;

                    // Shrink the container only as the footer truck appears
                    footerScale = 1 - (0.20 * progress);
                }
            }

            container.style.transform =
                `translate(calc(-50% + ${xOffset + footerOffsetX}px), ${currentY + extraY}px) scale(${scale * footerScale})`;

            requestAnimationFrame(smoothMovement);

    }

    updateContainerOnScroll();
    smoothMovement();

const maskBases = document.querySelectorAll('.mask-base');

maskBases.forEach(function (base) {

    const overlay = base
        .parentElement
        .querySelector('.mask-overlay');

    if (!overlay) return;


    function updateMask() {

        const textRect = base.getBoundingClientRect();
        const imageRect = container.getBoundingClientRect();

        const left = Math.max(
            textRect.left,
            imageRect.left
        );

        const right = Math.min(
            textRect.right,
            imageRect.right
        );

        const top = Math.max(
            textRect.top,
            imageRect.top
        );

        const bottom = Math.min(
            textRect.bottom,
            imageRect.bottom
        );

        if (left >= right || top >= bottom) {

            overlay.style.clipPath =
                'inset(0 0 100% 0)';

            return;
        }

        const clipTop =
            top - textRect.top;

        const clipRight =
            textRect.right - right;

        const clipBottom =
            textRect.bottom - bottom;

        const clipLeft =
            left - textRect.left;

        overlay.style.clipPath =
            `inset(
                ${clipTop}px
                ${clipRight}px
                ${clipBottom}px
                ${clipLeft}px
            )`;
    }


    function animateMask() {

        updateMask();

        requestAnimationFrame(animateMask);
    }

    animateMask();

});

});
</script>

</body>



</html>
