@extends('site.layouts.master')
@section('title', "$blog->title")
@section('content')
    <div class="blog-details-area section-gap-equal">
        <div class="container">
            <div class="row row--30">
                <div class="col-12">
                    <div class="blog-details-content">
                        <div class="entry-content">
                            <span class="category">{{ $blog->category->name }}</span>
                            <h3 class="title">{{ $blog->title }}</h3>
                            <ul class="blog-meta">
                                <li class="d-flex"><i class="icon-27"></i>
                                    {{ jalaliAgo($blog->created_at) }}
                                </li>
                            </ul>
                            <div class="thumbnail">
                                <img src="{{ asset($blog->image) }}" alt="Blog Image">
                            </div>
                        </div>
                        <div class="container">
                            {!! $blog->description !!}
                        </div>
                    </div>

                    <div class="blog-author">
                        <div class="thumbnail">
                            <img class="shadow" src="{{ asset($blog->user($blog->user_id)->profile) }}"
                                alt="{{ $blog->user($blog->user_id)->username }}">
                        </div>
                        <div class="author-content">
                            <h5 class="title">{{ $blog->user($blog->user_id)->username }}</h5>
                            <div class="container">
                                {!! $blog->user($blog->user_id)->bio !!}
                            </div>
                            <ul class="social-share icon-transparent">
                                <li>
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="blog-pagination">
                        <div class="row g-5">

                            @if ($other_blogs->count() > 0)
                                @foreach ($other_blogs as $item)
                                    <div class="col-lg-6">
                                        <div class="blog-pagination-list prev-post">
                                            <a href="{{ route('show-blog', $item->slug) }}">
                                                <i class="icon-east"></i>
                                                <span>{{ $item->title }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <p class="alert shadow alert-info rounded text-center">
                                        آیتمی برای نمایش یافت نشد !
                                    </p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
