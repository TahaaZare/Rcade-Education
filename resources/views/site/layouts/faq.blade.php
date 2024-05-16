<div class="edu-faq-area faq-style-2 bg-image">
    <div class="container">
        <div class="row g-5 row--45">
            <div class="col-lg-6">
                <div class="edu-faq-content">
                    <div class="section-title section-left" data-sal-delay="50" data-sal="slide-up"
                        data-sal-duration="1000">
                        <span class="pre-title">سوالات متداول</span>
                        <h2 class="title">بهترین فرهنگ آموزشی خود را با بلینک بیاموزید</h2>
                        <span class="shape-line"><i class="icon-19"></i></span>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        </p>
                    </div>
                    <div class="faq-accordion" id="faq-accordion" data-sal-delay="50" data-sal="slide-up"
                        data-sal-duration="1000">
                        <div class="accordion">

                            @foreach ($faqs as $item)
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $item->id }}" aria-expanded="true">

                                            {{ $item->question }}
                                        </button>
                                    </h5>
                                    <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse show"
                                        data-bs-parent="#faq-accordion-{{ $item->id }}">
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
            <div class="col-lg-6">
                <div class="edu-faq-gallery">
                    <div class="row g-5">
                        <div class="col-6" data-sal-delay="50" data-sal="slide-down" data-sal-duration="1000">
                            <div class="faq-thumbnail thumbnail-1">
                                <img src="{{ asset('site-assets/assets/images/faq/faq-05.webp') }}" alt="Faq Images">
                            </div>
                        </div>
                        <div class="col-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="1000">
                            <div class="faq-thumbnail thumbnail-2">
                                <img src="{{ asset('site-assets/assets/images/faq/faq-06.webp') }}" alt="Faq Images">
                            </div>
                        </div>
                    </div>
                    <ul class="shape-group">
                        <li class="shape-1 scene">
                            <img data-depth="2" src="{{ asset('site-assets/assets/images/faq/shape-06.png') }}"
                                alt="Shape Images">
                        </li>
                        <li class="shape-2">
                            <img data-depth="-2" src="{{ asset('site-assets/assets/images/faq/shape-04.png') }}"
                                alt="Shape Images">
                        </li>
                        <li class="shape-3 scene">
                            <img data-depth="2" src="{{ asset('site-assets/assets/images/faq/shape-16.png') }}"
                                alt="Shape Images">
                        </li>
                        <li class="shape-4 scene">
                            <img data-depth="-2" src="{{ asset('site-assets/assets/images/banner/shape-03.png') }}"
                                alt="Shape Images">
                        </li>
                        <li class="shape-5 scene">
                            <img data-depth="-2" src="{{ asset('site-assets/assets/images/faq/shape-08.png') }}"
                                alt="Shape Images">
                        </li>
                        <li class="shape-6 scene">
                            <img data-depth="1.7" src="{{ asset('site-assets/assets/images/faq/shape-09.png') }}"
                                alt="Shape Images">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
