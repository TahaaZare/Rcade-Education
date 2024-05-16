@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="info-box7 l-bg-green order-info-box7">
                <div class="info-box7-block">
                    <h4 class="m-b-20">کاربران سایت</h4>
                    <h2 class="text-right"><i class="fas fa-user-alt pull-left"></i><span>{{ $users->count() }}</span></h2>
                </div>
            </div>
        </div>


        <div class="">
            @foreach ($users as $item)
                <div class="col-12">
                    @if ($item->status == 1)
                        <div class="card" style="border: 2px solid green">
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
                        <div class="card" style="border: 2px solid red">
                            <div class="header">
                                <h2>
                                    <span class="text-xs text-white badge bg-danger font-weight-bold">
                                        در انتظار تایید . . .
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
                </div>
            @endforeach
        </div>

        <hr>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="header">
                    <h3>
                        اسلایدر های سایت
                    </h3>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    {{-- <a href="{{ route('admin.slider.create') }}">افزودن</a> --}}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="owl-carousel owl-theme owl-loaded owl-drag" id="basic_demo">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-2148px, 0px, 0px); transition: all 0s ease 0s; width: 3820px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
