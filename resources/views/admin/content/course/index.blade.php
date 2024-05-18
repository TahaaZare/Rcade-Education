@extends('pwa.master')
@section('title', 'دوره ها')
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
                <a class="btn btn-outline-secondary" href="{{ route('admin.course-category.index', $user->username) }}">دسته
                    بندی</a>
                <div class="">
                    <h3> دوره ها
                        <span class="badge bg-info mx-2">{{ $courses->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('admin.course.create', $user->username) }}">افزودن</a>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($courses as $item)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="{{ asset($item->image) }}" class="image" alt="{{ $item->name }}">
                            <h2 class="title d-flex justify-content-center">
                                {{ $item->name }}
                            </h2>
                            <br>
                            <h3 class="title d-flex justify-content-between">

                                <span class="badge bg-secondary rounded mx2">
                                    استاد : {{ $item->master->username }}
                                </span>
                                <span class="badge bg-primary rounded mx2">
                                    @if ($item->course_level == 0)
                                        مقدماتی
                                    @elseif($item->course_level == 1)
                                        معمولی
                                    @elseif ($item->course_level == 2)
                                        سخت
                                    @elseif ($item->course_level == 3)
                                        پیشرفته
                                    @endif
                                </span>
                                <span class="badge bg-info rounded mx2">
                                    @if ($item->course_status == 0)
                                        مقدماتی
                                    @elseif($item->course_status == 1)
                                        معمولی
                                    @elseif ($item->course_status == 2)
                                        سخت
                                    @elseif ($item->course_status == 3)
                                        پیشرفته
                                    @endif
                                </span>
                                @if ($item->status == 1)
                                    <span class="badge bg-success rounded mx2">فعال</span>
                                @else
                                    <span class="badge bg-danger rounded mx2">غیرفعال</span>
                                @endif
                            </h3>
                            <br>

                            <div class="price">
                                ایجاد شده توسط : {{ $item->user->username }} -
                                {{ jalaliDate($item->created_at) }}
                            </div>
                            <a href="{{ route('admin.course.edit', [$user->username, $item]) }}"
                                class="btn btn-sm btn-warning btn-block my-2">ویرایش</a>
                            <form action="{{ route('admin.course.delete', [$user->username, $item]) }}" method="POST">
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
        </div>

    </div>
    </div>

@endsection
