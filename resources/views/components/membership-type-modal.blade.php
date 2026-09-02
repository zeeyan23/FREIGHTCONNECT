<div class="modal fade" id="membershipTypeModal" tabindex="-1" aria-labelledby="membershipTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content membership-modal">

            <div class="modal-header border-0">
                <div>
                    <span class="membership-modal-label">MEMBERSHIP</span>
                    <h5 class="modal-title" id="membershipTypeModalLabel">
                        Request an Invitation
                    </h5>
                    <p class="mb-0">
                        Choose your membership type to continue.
                    </p>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body pt-2">

                <div class="membership-options">

                    <!-- Freight Forwarding -->
                    <a href="{{ route('membership.freight-forwarding') }}"
                        class="membership-option freight-option">
                        <div class="membership-option-icon">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>

                        <div class="membership-option-content">
                            <h6>Freight Forwarding Member</h6>
                            <p>
                                For freight forwarding and logistics companies.
                            </p>
                        </div>

                        <i class="fa-solid fa-arrow-right membership-option-arrow"></i>
                    </a>


                    <!-- Trader -->
                    <a href="{{ route('membership.trade-partner') }}"
                        class="membership-option trader-option">
                        <div class="membership-option-icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>

                        <div class="membership-option-content">
                            <h6>Trade Partner / Trader</h6>
                            <p>
                                For traders, importers, exporters and businesses.
                            </p>
                        </div>

                        <i class="fa-solid fa-arrow-right membership-option-arrow"></i>
                    </a>

                </div>

            </div>

        </div>
    </div>
</div>