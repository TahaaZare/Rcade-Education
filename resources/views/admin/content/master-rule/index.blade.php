@extends('pwa.master')
@section('title', 'قوانین در خواست مدرس')
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
                    <h3> قوانین در خواست مدرس
                    </h3>
                </div>
            </div>
            <hr>
            <div class="accordion" id="accordionExample3">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion-{{ $Rule->id }}">
                            <span class="fas fa-check-circle text-success mx-2"></span>
                            قوانین در خواست مدرس
                        </button>
                    </h2>
                    <div id="accordion-{{ $Rule->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample3">
                        <div class="accordion-body">
                            {!! $Rule->description !!}
                            <div class="p-3 d-inline-flex bg-transparent">
                                <a href="{{ route('admin.rule.edit', [$user->username, $Rule]) }}"
                                    class="btn btn-warning mx-2 rounded">ویرایش</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
