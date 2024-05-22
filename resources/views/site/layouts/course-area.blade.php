<div class="home-four-course edu-course-area course-area-4 gap-tb-text bg-image">
    <div class="container edublink-animated-shape">
        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title">دوره‌های محبوب</span>
            <h2 class="title">برای شروع یک دوره انتخاب کنید</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="row g-5">
            <!-- Start Single Course  -->
            @foreach ($courses as $item)
                <div class="col-xl-6" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-course course-style-4">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="content">
                                <div class="course-price">
                                    @if ($item->price == 0)
                                        <span class="text-success">
                                            رایگانــ
                                        </span>
                                    @else
                                        <span class="text-primary">
                                            {{ priceFormatToPersian($item->price) }}
                                        </span>
                                    @endif
                                </div>
                                <h6 class="title">
                                    <a href="">{{ $item->name }}</a>
                                </h6>
                                <div class="course-rating">
                                    <div class="rating">
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                    </div>
                                    {{-- <span class="rating-count">(5.0 /9 امتیاز)</span> --}}
                                </div>
                                <ul class="course-meta">
                                    <li class="d-flex"><i class="icon-24"></i>0 درس</li>
                                    <li class="d-flex"><i class="icon-25"></i>0 دانشجو</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Single Course  -->
        </div>
        <div class="course-view-all" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
            <a href="{{ route('courses') }}" class="edu-btn">دوره‌های بیشتر <i class="icon-west"></i></a>
        </div>
        <ul class="shape-group">
            <li class="shape-1 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                <img data-depth="-2" src="{{ asset('site-assets/assets/images/about/shape-13.png') }}" alt="Shape">
            </li>
            <li class="shape-2 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                <span data-depth="1"></span>
            </li>
        </ul>
    </div>
</div>
