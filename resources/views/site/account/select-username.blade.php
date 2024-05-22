@extends('pwa.master')
@section('title', 'نام کاربری')

@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="login-form mt-1">
        <div class="section mt-1">
            <h4>برای ادامه لطفا نام کاربری خود را وارد کنید </h4>
        </div>
        <div class="section mt-1 mb-5">
            <form class="" id="form" action="{{ route('confirm-username', $user) }}" method="POST">
                @csrf
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input class="form-control" required type="text" oninput="convertToEnglish(event)"
                            value="{{ old('username') }}" name="username" placeholder="نام کاربری خود را وارد کنید">
                        <i class="clear-input">
                            <ion-icon name="close-circle">
                                <i class="fas fa-close" aria-hidden="true"></i>
                            </ion-icon>
                        </i>
                    </div>
                </div>
                @error('username')
                    <span class="alert_required fw-bold bg-danger text-white p-1 rounded" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </span>
                @enderror

                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">ثبت</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('site-assets/jquery.min.js') }}"></script>
    <script>
        function convertToEnglish(event) {
            var inputValue = event.target.value;
            var convertedValue = "";
            for (var i = 0; i < inputValue.length; i++) {
                var charCode = inputValue.charCodeAt(i);
                var convertedDigit = "";
                if (charCode >= 1632 && charCode <= 1641) {
                    // تبدیل اعداد فارسی به انگلیسی
                    convertedDigit = String.fromCharCode(charCode - 1584);
                } else if (charCode >= 1776 && charCode <= 1785) {
                    // تبدیل اعداد عربی به انگلیسی
                    convertedDigit = String.fromCharCode(charCode - 1728);
                } else {
                    // غیر از اعداد فارسی و عربی، بدون تغییر
                    convertedDigit = inputValue.charAt(i);
                }
                convertedValue += convertedDigit;
            }
            event.target.value = convertedValue;
        }
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Auth\ConfirmUserNameLogin') !!}

    @include('site.alerts.sweetalert.success')
@endsection
