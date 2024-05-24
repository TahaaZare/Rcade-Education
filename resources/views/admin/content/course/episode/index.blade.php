@extends('pwa.master')
@section('title', 'قسمت ها')

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
                <div class="">
                    <h3>
                        قسمت ها
                        <span class="badge bg-info mx-2">{{ $episodes->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary"
                    href="{{ route('admin.course-episode.create', [$user->username, $course, $sesson]) }}">افزودن</a>
            </div>
            <hr>
            @foreach ($episodes as $item)
                <div class="accordion" id="accordionExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordion-{{ $item->id }}">
                                <span class="fas fa-check-circle text-success mx-2"></span>
                                {!! $item->name !!} ( دوره {{ $item->course($item->course_id)->name }})

                                @if ($item->status == 1)
                                    <span class="badge bg-success rounded mx-2">تایید شده</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-primary rounded mx-2">در انتظار تایید . . .</span>
                                @else
                                    <span class="badge bg-danger rounded mx-2">رد شده !</span>
                                @endif
                            </button>
                        </h2>
                        <div id="accordion-{{ $item->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample3">
                            توضیحات : {!! $item->description !!}
                            <hr>
                            <span>
                                نوع فایل : {{ $item->file_type }}
                                <br>
                                حجم فایل : {{ formatBytes($item->file_size) }}
                                <br>

                            </span>
                            <div class="accordion-body">
                                <div class="p-3 d-inline-flex justify-content-center bg-transparent">
                                    <a href="{{ route('admin.course-episode.edit', [$user->username, $course, $sesson, $item]) }}"
                                        class="btn btn-warning mx-2 rounded">ویرایش</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
