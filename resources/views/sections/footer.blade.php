
<footer class="site-footer text-light">
   <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 footer-main">
            <div class="col footer-column footer-brand">
                <a href="#" class="footer-logo text-decoration-none fw-bold fs-4">
                    <img
                        src="{{ asset('images/logos/2.svg') }}"
                        alt="FreightConnect"
                        class="footer-logo"
                    >
                </a>
                <div class="footer-socials d-flex gap-3">
                    <a href="#" aria-label="LinkedIn" class="text-secondary fs-5 text-decoration-none">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" aria-label="Instagram" class="text-secondary fs-5 text-decoration-none">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" aria-label="Facebook" class="text-secondary fs-5 text-decoration-none">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            <div class="col footer-column">
                <h5 class="fs-6 fw-bold text-uppercase mb-3">Quick Links</h5>
                <div class="d-flex flex-column gap-2">
                    <a href="#about" class="text-secondary text-decoration-none">
                        About us
                    </a>

                    <a href="#benefits" class="text-secondary text-decoration-none">
                        Benefits
                    </a>

                    <a href="#opportunities" class="text-secondary text-decoration-none">
                        Opportunity preview
                    </a>
                    <a href="#howitworks" class="text-secondary text-decoration-none">
                        How it works
                    </a>
                    <a href="#newsSection" class="text-secondary text-decoration-none">
                        Insights & Updates
                    </a>
                    <a href="#membership" class="text-secondary text-decoration-none">
                        Membership
                    </a>
                    <a href="#faq" class="text-secondary text-decoration-none">
                        FAQs
                    </a>
                </div>
            </div>

            <div class="col footer-column legal-column">
                <h5 class="fs-6 fw-bold text-uppercase mb-3">Legal</h5>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('legal.privacy-policy') }}" class="text-secondary text-decoration-none">
                        Privacy Policy
                    </a>

                    <a href="{{ route('legal.membership-terms') }}" class="text-secondary text-decoration-none">
                        Membership Terms &amp; Conditions
                    </a>

                    <a href="{{ route('legal.payment-recovery') }}" class="text-secondary text-decoration-none">
                        Member Payment Recovery Support Terms &amp; Conditions
                    </a>
                </div>
            </div>

            <div class="col footer-column">
                <h5 class="fs-6 fw-bold text-uppercase mb-3">Contact Us</h5>

                <div class="d-flex flex-column gap-3">

                    <!-- Address -->
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-geo-alt text-secondary mt-1"></i>
                        <span class="text-secondary">
                            Your Business Address,<br>
                            City, Country
                        </span>
                    </div>

                    <!-- Email -->
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-envelope text-secondary mt-1"></i>
                        <a href="mailto:info@yourdomain.com"
                        class="text-secondary text-decoration-none">
                            info@yourdomain.com
                        </a>
                    </div>

                    <!-- Phone -->
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-telephone text-secondary mt-1"></i>
                        <a href="tel:+971500000000"
                        class="text-secondary text-decoration-none">
                            +971 50 000 0000
                        </a>
                    </div>

                </div>
            </div>


        </div>

        <hr class="my-4">
        <div class="row footer-bottom align-items-center my-4">
            <div class="col-12 col-md-6 text-center text-md-start">
                <span class="text-secondary small">
                    &copy; 2026 FreightConnect. All rights reserved.
                </span>
            </div>
        </div>
    </div>
</footer>

<div class="footer-truck-section container text-center my-4">
    <img 
        src="{{ asset('images/footer/truck.png') }}" 
        alt="FreightConnect Fleet" 
        class="img-fluid"
    >
</div>