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
                <div class="col-lg-4 col-md-6 col-sm-12  py-3">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="{{ asset($item->image) }}" class="image" alt="{{ $item->name }}">
                            <div class="d-flex justify-content-between">
                                <h2 class="title d-flex justify-content-center">
                                    {{ $item->name }}
                                </h2>

                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white-50 " type="button"
                                        data-bs-toggle="dropdown" aria-hidden="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h fa-lg text-success"></i>
                                    </button>
                                    <div class="dropdown-menu " style="">
                                        <a href="{{ route('admin.course.edit', [$user->username, $item]) }}"
                                            class="btn btn-sm btn-warning p-2 dropdown-item">
                                            ویرایش
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('admin.course-sesson.index', [$user->username, $item]) }}"
                                            class="btn btn-sm btn-primary p-2 dropdown-item">
                                            افزودن سرفصل جدید
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('admin.course.delete', [$user->username, $item]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger dropdown-item">
                                                حذفــ </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
                                        به زودی . . .
                                    @elseif($item->course_status == 1)
                                        در حال ظبط
                                    @elseif ($item->course_status == 2)
                                        در حال برگزاری
                                    @elseif ($item->course_status == 3)
                                        به اتمام رسیده
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



                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>

@endsection
