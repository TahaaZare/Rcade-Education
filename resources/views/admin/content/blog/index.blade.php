@extends('pwa.master')
@section('title', 'مقالات')
@section('app-menu')
    @include('pwa.app-button-menu')
@endsection
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card p-4">
            <div class="d-flex justify-content-between">
                <a class="btn btn-outline-secondary" href="{{ route('admin.blog-category.index', $user->username) }}">دسته
                    بندی</a>
                <div class="">
                    <h3> مقالات
                        <span class="badge bg-info mx-2">{{ $blogs->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('admin.blog.create', $user->username) }}">افزودن</a>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <div class="card product-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset($item->image) }}" style="width: 100%;height: 300px" class="image"
                                    alt="{{ $item->title }}">
                            </div>
                            <h2 class="title d-flex justify-content-between">{{ $item->title }}
                                @if ($item->status == 1)
                                    <span class="badge bg-success rounded mx2">فعال</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-primary rounded mx2">در انتظار تایید . . .</span>
                                @else
                                    <span class="badge bg-danger rounded mx2">رد شده !</span>
                                @endif
                            </h2>
                            <p class="text">
                                توسط : {{ $item->user($item->create_by)->username }}
                            </p>
                            <div class="price">
                                {{ jalaliDate($item->created_at) }}
                            </div>
                            <a href="{{ route('admin.blog.edit', [$user->username, $item]) }}"
                                class="btn btn-sm btn-warning btn-block my-2">ویرایش</a>
                            <form action="{{ route('admin.blog.delete', [$user->username, $item]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-block">
                                    حذفــ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <nav class="my-4">
                <ul class="pagination pagination-secondary">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </ul>
            </nav>

        </div>

    </div>
    </div>

@endsection
