@extends('pwa.master')
@section('app-menu')
    @include('pwa.app-button-menu')
@endsection
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="section mt-3 mb-3">
        <div class="card container">
            <div class="card-body  d-flex justify-content-between align-items-end">
                <div>
                    <h5 class="card-title mb-0 d-flex align-items-center justify-content-between">
                        کاربران سایت
                    </h5>
                </div>
                <span class="badge badge-info">{{ $users->count() }}</span>
            </div>
        </div>
        <div class="carousel-multiple my-4  splide splide--loop splide--rtl splide--draggable is-active" id="splide04"
            style="visibility: visible;">
            <div class="splide__track" id="splide04-track" style="padding-left: 20px; padding-right: 20px;">
                <ul class="splide__list" id="splide04-list" style="transform: translateX(2052.24px);">
                    @foreach ($users as $item)
                        <li class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1"
                            style="margin-left: 20px; width: 100px;">
                            @if ($item->status == 1)
                                <div class="card px-4 py-2" style="border: 2px solid green">
                                    <div class="header">
                                        <h2>
                                            <span class="text-xs text-white badge bg-success font-weight-bold">
                                                تایید شده
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="body p-7">

                                        نام کاربری :
                                        {{ $item->username }}
                                        <br>
                                        شماره تماس :
                                        {{ $item->mobile }}
                                    </div>
                                </div>
                            @else
                                <div class="card px-4 py-2" style="border: 2px solid red">
                                    <div class="header">
                                        <h2>
                                            <span class="text-xs text-white badge bg-success font-weight-bold">
                                                غیرفعال
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="body p-7">

                                        نام کاربری :
                                        {{ $item->username }}
                                        <br>
                                        شماره تماس :
                                        {{ $item->mobile }}
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
