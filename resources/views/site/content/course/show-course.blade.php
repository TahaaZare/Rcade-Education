@extends('site.layouts.master')
@section('title', "دوره : $course->name")
@section('content')
    <div class="edu-breadcrumb-area breadcrumb-style-6">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h2 class="title">
                        {{ $course->name }}
                    </h2>
                </div>
                <ul class="course-meta">
                    <li><i class="icon-58"></i>
                        {{ $course->master->username }}
                    </li>
                    <li><i class="icon-59"></i>فارسی</li>
                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <span></span>
            </li>
            <li class="shape-2 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="2" src="{{ asset('site-assets/assets/images/others/shape-79.png') }}" alt="shape"
                    style="transform: translate3d(-30.9px, 21.4px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
            <li class="shape-3 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="-2" src="{{ asset('site-assets/assets/images/about/shape-15.png') }}" alt="shape"
                    style="transform: translate3d(20px, -5.3px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
            <li class="shape-4">
                <span></span>
            </li>
            <li class="shape-5 scene"
                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                <img data-depth="2" src="{{ asset('site-assets/assets/images/about/shape-07.png') }}" alt="shape"
                    style="transform: translate3d(-24.4px, 26px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
            </li>
        </ul>
    </div>
    <section class="edu-section-gap course-details-area">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-8">
                    <div class="course-details-content course course-details-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#overview-tab-id">نمای کلی</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#instructor-tab-id">مدرس</a>
                            </li>
                        </ul>

                        <div class="course-content-wrapper">
                            <div class="tab-pane" id="overview-tab-id">
                                <div class="course-tab-content">
                                    <div class="course-overview">
                                        <h3 class="heading-title">توضیحات دوره</h3>
                                        {!! $course->description !!}
                                    </div>
                                </div>
                                <div class="course-curriculam mb--90">
                                    <div class="accordion edu-accordion sal-animate" id="accordionExample"
                                        data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                        @foreach ($sessions as $session)
                                            <div class="accordion-item shadow" style="border-radius: 1rem">
                                                <h3 class="accordion-header" id="heading{{ $session->id }}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $session->id }}" aria-expanded="true"
                                                        aria-controls="collapse-{{ $session->id }}">
                                                        {{ $session->name }}
                                                    </button>
                                                </h3>
                                                <div id="collapse-{{ $session->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $session->id }}"
                                                    data-bs-parent="#accordionExample" style="">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <ul>
                                                                @foreach ($episodes[$session->id] as $episode)
                                                                    <li>
                                                                        <div class="text"><i class="icon-65"></i>
                                                                            {{ $episode->name }}</div>
                                                                        <span>
                                                                            نوع فایل: {{ $episode->file_type }}
                                                                        </span>
                                                                        <span>
                                                                            حجم فایل:
                                                                            {{ formatBytes($episode->file_size) }}
                                                                        </span>
                                                                        <a href="{{ asset($episode->file_path) }}"
                                                                            download>
                                                                            <i class="fas fa-download"></i>
                                                                            دانلود
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane">
                                <div class="course-tab-content" id="instructor-tab-id">
                                    <div class="course-instructor">
                                        <div class="thumbnail">
                                            <img src="{{ asset($course->master->profile) }}"
                                                class="rounded rounded-circle shadow w-75"
                                                alt="{{ $course->master->username }}">
                                        </div>
                                        <div class="author-content">
                                            <h6 class="title">
                                                {{ $course->master->display_name ?? $course->master->username }}</h6>
                                            {!! $course->master->bio !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane">
                                <div class="course-tab-content">
                                    <div class="course-review" id="review-tab-id">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-sm-8">
                                                <!-- Start Comment Area  -->
                                                <div class="comment-area">
                                                    <h3 class="heading-title">نظرات</h3>
                                                    <div class="comment-list-wrapper">
                                                        <div class="comment-area">
                                                            <div class="comment-list-wrapper">
                                                                <div class="comment">
                                                                    <p class="alert alert-info rounded text-center">
                                                                        در حال حاضر نمیتوان کامنت گذاشت
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-sidebar-3 sidebar-top-position">
                        <div class="edu-course-widget widget-course-summery">
                            <div class="inner">
                                <div class="thumbnail">
                                    <img src="{{ asset($course->image) }}" alt="Courses">
                                    {{-- <a href="https://www.youtube.com/watch?v=PICj5tr9hcc"
                                        class="play-btn video-popup-activation"><i class="icon-18"></i></a> --}}
                                </div>
                                <div class="content">
                                    <h4 class="widget-title">دوره شامل:</h4>
                                    <ul class="course-item">
                                        <li>
                                            <span class="label"><i class="icon-60"></i>قیمت:</span>
                                            <span class="value price">
                                                @if ($course->price == 0)
                                                    رایگانـ
                                                @else
                                                    {{ priceFormatToPersian($course->price) }}
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span class="label"><i class="icon-63"></i>وضعیت دوره :</span>
                                            <span class="value">
                                                @if ($course->course_status == 0)
                                                    به زودی . . .
                                                @elseif($course->course_status == 1)
                                                    در حال ظبط
                                                @elseif ($course->course_status == 2)
                                                    در حال برگزاری
                                                @elseif ($course->course_status == 3)
                                                    به اتمام رسیده
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span class="label"><i class="icon-62"></i>مدرس:</span>
                                            <span class="value">
                                                {{ $course->master->display_name ?? $course->master->username }}
                                            </span>
                                        </li>

                                        <li>
                                            <span class="label"><i class="icon-63"></i>دانشجو :</span>
                                            <span class="value">0</span>
                                        </li>
                                    </ul>
                                    <div class="read-more-btn">
                                        <a href="#" class="edu-btn">الان شروع کنید <i class="icon-west"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
