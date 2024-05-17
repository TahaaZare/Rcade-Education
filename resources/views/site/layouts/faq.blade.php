<div class="edu-faq-area faq-style-9 section-gap-equal">
    <div class="container">
        <div class="row g-5 row--45">
            <div class="col-lg-6">
                <div class="section-title section-left sal-animate" data-sal-delay="150" data-sal="slide-right"
                    data-sal-duration="800">
                    <span class="pre-title">سوالات متداول</span>
                </div>
                <div class="d-flex align-items-start sal-animate" data-sal-delay="200" data-sal="slide-right"
                    data-sal-duration="800">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">سوالات عمومی</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="edu-faq-content">
                    <div class="tab-content sal-animate" id="v-pills-tabContent" data-sal-delay="150"
                        data-sal="slide-up" data-sal-duration="800">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="faq-accordion" id="faq-accordion">
                                <div class="accordion">
                                    @foreach ($faqs as $item)
                                        <div class="accordion-item">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $item->id }}"
                                                    aria-expanded="false">
                                                    {{ $item->question }}
                                                </button>
                                            </h5>
                                            <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse"
                                                data-bs-parent="#faq-accordion" style="">
                                                <div class="accordion-body">
                                                    {!! $item->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="shape-group">
                        <li class="shape-1 scene sal-animate" data-sal-delay="500" data-sal="fade"
                            data-sal-duration="200"
                            style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                            <img data-depth="1.5" src="{{ asset('site-assets/assets/images/others/shape-55.png') }}"
                                alt="Shape Images"
                                style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                        </li>
                        <li class="shape-2 scene sal-animate" data-sal-delay="500" data-sal="fade"
                            data-sal-duration="200"
                            style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                            <img data-depth="-1.5" src="{{ asset('site-assets/assets/images/others/shape-56.png') }}"
                                alt="Shape Images"
                                style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
