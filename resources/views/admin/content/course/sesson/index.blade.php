@extends('pwa.master')
@section('title', 'سرفصل ها')

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
                        سرفصل ها
                        <span class="badge bg-info mx-2">{{ $sessons->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary"
                    href="{{ route('admin.course-sesson.create', [$user->username, $course]) }}">افزودن</a>
            </div>
            <hr>
            @foreach ($sessons as $item)
                <div class="accordion" id="accordionExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordion-{{ $item->id }}">
                                <span class="fas fa-check-circle text-success mx-2"></span>
                                {!! $item->name !!} ( دوره {{ $item->course($item->course_id)->name }})
                            </button>
                        </h2>
                        <div id="accordion-{{ $item->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample3">
                            <div class="accordion-body">
                                <div class="p-3 d-inline-flex justify-content-center bg-transparent">
                                    <a href="{{ route('admin.course-episode.index', [$user->username, $course, $item]) }}"
                                        class="btn btn-primary mx-2 rounded">افزودن ویدیو</a>

                                    <a href="{{ route('admin.course-sesson.edit', [$user->username, $course, $item]) }}"
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
