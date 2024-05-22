<div class="edu-blog-area blog-area-3 edu-section-gap">
    <div class="container">
        <div class="section-title section-center" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
            <h2 class="title">آخرین مقالات</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="row g-5">
            <!-- Start Blog Grid  -->
            @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-6 col-12 sal-animate sha" data-sal-delay="100" data-sal="slide-up"
                    data-sal-duration="800">
                    <div class="edu-blog blog-style-1 programming-sytle">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('show-blog',$item->slug) }}">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">                                </a>
                            </div>
                            <div class="content">
                                <div class="category-wrap">
                                    <a href="#" class="blog-category">{{ $item->category->name }}</a>
                                </div>
                                <h5 class="title"><a href="{{ route('show-blog',$item->slug) }}">{{ $item->title }}</a></h5>
                                <ul class="blog-meta">
                                    <li class="d-flex"><i class="icon-27"></i>{{ jalaliShamsiDate($item->created_at) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Blog Grid  -->
        </div>
    </div>
</div>
