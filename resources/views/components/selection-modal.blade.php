<div class="modal fade"
     id="{{ $id }}"
     tabindex="-1"
     aria-labelledby="{{ $id }}Label"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content selection-modal">

            <div class="modal-header border-0">

                <div>
                    <span class="selection-modal-label">
                        {{ $label }}
                    </span>

                    <h5 class="modal-title" id="{{ $id }}Label">
                        {{ $title }}
                    </h5>

                    <p class="mb-0">
                        {{ $description }}
                    </p>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>

            </div>

            <div class="modal-body pt-2">

                <div class="selection-options">

                    @foreach($options as $option)

                        <a href="{{ $option['url'] }}"
                           class="selection-option">

                            <div class="selection-option-icon">
                                <i class="{{ $option['icon'] }}"></i>
                            </div>

                            <div class="selection-option-content">

                                <h6>
                                    {{ $option['title'] }}
                                </h6>

                                <p>
                                    {{ $option['description'] }}
                                </p>

                                
                            </div>

                            <i class="fa-solid fa-arrow-right selection-option-arrow"></i>

                        </a>

                    @endforeach

                </div>

                @if(!empty($showTradeLogin) && $showTradeLogin)

                    <div class="trade-member-login d-none" id="tradeMemberLoginPanel">

                        <!-- <button type="button"
                                class="btn btn-link p-0 mb-3"
                                id="backToTradeMemberOptions">
                            <i class="fa-solid fa-arrow-left me-2"></i>
                            Back
                        </button>

                        <h5 class="mb-3">Trade Member Login</h5> -->

                        @include('components.trade-member-login-form')

                    </div>

                @endif

                @if(!empty($info))

                    <div class="selection-modal-info">

                        <div class="selection-modal-info-title">

                            <i class="fa-solid fa-circle-info"></i>

                            <span>
                                {{ $info['title'] }}
                            </span>

                        </div>

                        <p>
                            {{ $info['description'] }}
                        </p>

                    </div>

                @endif

            </div>

        </div>
    </div>

</div>