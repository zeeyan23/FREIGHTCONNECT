@extends('layouts.app')

@section('content')

<section class="legal-page">


<div class="container">

    {{-- Legal Header --}}
    <div class="legal-header">

        <span class="legal-label">
            @yield('legal-label', 'FREIGHTCONNECT LEGAL')
        </span>

        <h1>
            @yield('title')
        </h1>

        <p>
            @yield('legal-description')
        </p>

        <div class="legal-updated">

            <i class="fa-regular fa-calendar"></i>

            Last updated:
            @yield('updated-date', 'September 3, 2026')

        </div>

    </div>


    <div class="legal-layout">

        {{-- Sidebar --}}
        <aside class="legal-sidebar">

            <div class="legal-sidebar-card">

                <span class="legal-sidebar-title">
                    ON THIS PAGE
                </span>

                <nav class="legal-navigation">

                    @yield('legal-navigation')

                </nav>

            </div>

        </aside>


        {{-- Main Document --}}
        <article class="legal-content">

            @yield('legal-content')

        </article>

    </div>

</div>


</section>

@endsection
