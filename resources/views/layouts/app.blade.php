<!DOCTYPE html>
<html lang="en">

<head>
    <title>FREIGHTCONNECT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/css/intlTelInput.css"/>

    <link rel="stylesheet" href="{{ asset('css/sections/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/membership.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sections/why-join.css') }}">
    <link rel="stylesheet" href="{{ asset('css/floating-whatsapp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/membership-type-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/membership/trade-partner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/membership/freight-forwarding.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.5/build/js/intlTelInput.min.js"></script>


</head>

<body>

    @yield('content')
    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/971XXXXXXXXX"
        class="whatsapp-float"
        target="_blank"
        aria-label="Chat with us on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
    </a>
</body>

</html>