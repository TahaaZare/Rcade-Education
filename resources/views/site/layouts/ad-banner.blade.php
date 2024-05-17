<div class="university-cta-wrapper edu-cta-banner-area bg-image">
    <div class="container">
        <div class="edu-cta-banner">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="home-four-cta edu-cta-box cta-style-3 bg-image bg-image--16">
                        <div class="inner">
                            @php
                                $email = 'rcadeeteam@gmail.com';
                            @endphp
                            <div class="content text-center">
                                <span class="subtitle">در تماس باشید:</span>
                                <h3 class="title"><a href="mailto:{{ $email }}">{{ $email }}</a></h3>
                            </div>
                            {{-- <div class="sparator">
                                <span>یا</span>
                            </div> --}}
                        </div>
                        <ul class="shape-group">
                            <li class="shape-01 scene">
                                <img data-depth="2" src="{{ asset('site-assets/assets/images/cta/shape-06.png') }}"
                                    alt="shape">
                            </li>
                            <li class="shape-02 scene">
                                <img data-depth="-2" src="{{ asset('site-assets/assets/images/cta/shape-12.png') }}"
                                    alt="shape">
                            </li>
                            <li class="shape-03 scene">
                                <img data-depth="-3" src="{{ asset('site-assets/assets/images/cta/shape-04.png') }}"
                                    alt="shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-01 scene">
                    <img data-depth="2.5" src="{{ asset('site-assets/assets/images/cta/shape-10.png') }}"
                        alt="shape">
                </li>
                <li class="shape-02 scene">
                    <img data-depth="-2.5" src="{{ asset('site-assets/assets/images/cta/shape-09.png') }}"
                        alt="shape">
                </li>
                <li class="shape-03 scene">
                    <img data-depth="-2" src="{{ asset('site-assets/assets/images/cta/shape-08.png') }}" alt="shape">
                </li>
                <li class="shape-04 scene">
                    <img data-depth="2" src="{{ asset('site-assets/assets/images/about/shape-13.png') }}"
                        alt="shape">
                </li>
            </ul>
        </div>
    </div>
</div>
