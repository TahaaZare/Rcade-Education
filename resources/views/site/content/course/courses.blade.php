@extends('site.layouts.master')
@section('title', 'دوره هـا')
@section('content')
    <div class="edu-breadcrumb-area">
        <ul class="shape-group">
            <li class="shape-1">
                <span></span>
            </li>
            <li class="shape-2 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="2" src="{{ asset('site-assets/assets/images/about/shape-13.png') }}" alt="shape"
                    style="transform: translate3d(-37.1px, 34.6px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
            <li class="shape-3 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="-2" src="{{ asset('site-assets/assets/images/about/shape-15.png') }}" alt="shape"
                    style="transform: translate3d(20.2px, -7.3px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
            <li class="shape-4">
                <span></span>
            </li>
            <li class="shape-5 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="2" src="{{ asset('site-assets/assets/images/about/shape-07.png') }}" alt="shape"
                    style="transform: translate3d(-24.6px, 35.6px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
        </ul>
    </div>
    <div class="row g-5">
        <!-- Start Single Course  -->
        @foreach ($courses as $item)

            <div class="col-md-6 col-lg-4 sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="edu-course course-style-3 course-box-shadow">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{ route('show-course', $item->slug) }}">
                                <img src="{{ asset($item->image) }}" alt="Course Meta">
                            </a>
                        </div>
                        <div class="content">
                            <span class="course-level">
                                {{ $item->cat($item->category_id)->name }}
                            </span>
                            <h5 class="title">
                                <a href="{{ route('show-course', $item->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </h5>
                            <p>
                                {{ $item->summary }}
                            </p>
                            <div class="course-rating">
                                <div class="rating">
                                    <i class="icon-23"></i>
                                    <i class="icon-23"></i>
                                    <i class="icon-23"></i>
                                    <i class="icon-23"></i>
                                    <i class="icon-23"></i>
                                </div>
                            </div>
                            <div class="read-more-btn">
                                <a class="edu-btn btn-small btn-secondary"
                                    href="{{ route('show-course', $item->slug) }}">اطلاعات بیشتر <i
                                        class="icon-west"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <ul class="edu-pagination top-space-30">
            {!! $courses->links('pagination::bootstrap-5') !!}
        </ul>
        <!-- End Single Course  -->
    </div>

@endsection
