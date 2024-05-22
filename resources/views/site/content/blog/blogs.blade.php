@extends('site.layouts.master')
@section('title', 'مقالات')
@section('content')
    <section class="section-gap-equal">
        <div class="container">
            <div class="row g-5" id="masonry-gallery" style="position: relative; height: 1608.75px;">
                <!-- Start Blog Grid  -->
                @foreach ($blogs as $item)
                    <div class="col-lg-4 col-md-6 col-12 masonry-item sal-animate" data-sal-delay="100" data-sal="slide-up"
                        data-sal-duration="800" style="position: absolute; left: 0px; top: 0px;">
                        <div class="edu-blog blog-style-5">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ route('show-blog', $item->slug) }}">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                    </a>
                                </div>
                                <div class="content position-top">
                                    <div class="read-more-btn">
                                        <a class="btn-icon-round" href="{{ route('show-blog', $item->slug) }}"><i
                                                class="icon-west"></i></a>
                                    </div>
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">{{ $item->category->name }}</a>
                                    </div>
                                    <h5 class="title"><a href="{{ route('show-blog', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li class="d-flex"><i class="icon-27"></i>
                                        {{ jalaliDate($item->created_at) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Blog Grid  -->
            </div>


            <ul class="edu-pagination top-space-30">
                <li><a href="#" aria-label="Previous"><i class="icon-east"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="more-next"><a href="#"></a></li>
                <li><a href="#">8</a></li>
                <li><a href="#" aria-label="Next"><i class="icon-west"></i></a></li>
            </ul>

        </div>
    </section>
@endsection
