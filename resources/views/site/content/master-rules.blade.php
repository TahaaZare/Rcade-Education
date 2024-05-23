@extends('pwa.master')
@section('title', 'مدرس شـو')
@section('app-menu')
    @include('pwa.app-button-menu')
@endsection
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="section mt-2">
        <div class="card">
            <div class="card-header">
                مدرس شــو
            </div>
            <div class="card-body">
                {!! $rule->description !!}
            </div>
        </div>
    </div>
@endsection
