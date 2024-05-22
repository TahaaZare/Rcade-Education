<div class="edu-categorie-area categorie-area-3 edu-section-gap bg-image" id="دسته‌بندی‌ها">
    <div class="container">
        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title pre-textsecondary">دسته‌بندی‌ها</span>
            <h2 class="title"><span class="color-primary">کلاس‌های</span> آنلاین برای یادگیری از راه دور.</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4">
            @foreach ($course_categories as $item)
                <div class="col" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="categorie-grid categorie-style-3 color-primary-style">
                        <div class="">
                            <img src="{{ asset($item->image) }}" class="icon" style="border-radius: 100%" alt="">
                        </div>
                        <div class="content">
                            <a href="">
                                <h5 class="title">{{ $item->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
