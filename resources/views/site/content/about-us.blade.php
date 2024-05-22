@extends('site.layouts.master')
@section('title', 'درباره ما')

@section('content')
    <div class="section-gap-large edu-about-area about-style-7">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-9 shadow" style="border-radius: 1rem;background-color: transparent">
                    <div class="about-content ">
                        <div class="section-title section-left sal-animate" data-sal-delay="150" data-sal="slide-up"
                            data-sal-duration="800">
                            <span class="pre-title">درباره ما</span>
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="about-image-gallery">
                        <ul class="shape-group">
                            <li class="shape-1 scene sal-animate" data-sal-delay="500" data-sal="fade"
                                data-sal-duration="200"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img data-depth="2" src="{{ asset('site-assets/assets/images/about/shape-38.png') }}" alt="Shape"
                                    style="transform: translate3d(-41.9px, 31.6px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                            </li>
                            <li class="shape-2 scene sal-animate" data-sal-delay="500" data-sal="fade"
                                data-sal-duration="200"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img data-depth="-2" src="{{ asset('site-assets/assets/images/about/shape-37.png') }}" alt="Shape"
                                    style="transform: translate3d(34.7px, -28.5px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                            </li>
                            <li class="shape-3 scene sal-animate" data-sal-delay="500" data-sal="fade"
                                data-sal-duration="200"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img data-depth="-1.8" src="{{ asset('site-assets/assets/images/about/shape-04.png') }}" alt="Shape"
                                    style="transform: translate3d(49.1px, -38.2px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                            </li>
                            <li class="shape-4 scene sal-animate" data-sal-delay="500" data-sal="fade"
                                data-sal-duration="200"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="{{ asset('site-assets/assets/images/counterup/shape-02.png') }}" alt="Shape"
                                    style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1 sal-animate" data-sal-delay="500" data-sal="fade" data-sal-duration="200"></li>
        </ul>
    </div>
@endsection
