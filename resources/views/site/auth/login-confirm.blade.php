@extends('pwa.master')
@section('title', 'ورود')

@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="login-form mt-1">
        <div class="section">
            <img src="{{ asset('static-img/vector4.png') }}" alt="image" class="form-image">
        </div>
        <div class="section mt-1">
            <h4>کد تایید وارد کنید</h4>
        </div>
        <div class="section mt-1 mb-5">
            <form action="{{ route('auth.login-confirm', $token) }}" method="POST">
                @csrf
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        @if ($otp->type == 0)
                            <div class="">
                                <span class="login-info text-center ">
                                    کد تایید برای شماره موبایل {{ $otp->login_id }} ارسال گردید
                                </span>
                                <hr>
                            </div>
                        @endif
                        <input class="form-control" type="text" oninput="convertToEnglish(event)"
                            value="{{ old('otp') }}" name="otp">
                        <i class="clear-input">
                            <ion-icon name="close-circle">
                                <i class="fas fa-close" aria-hidden="true"></i>
                            </ion-icon>
                        </i>
                        <section id="timer" class="text-center font-weight-bolder"></section>
                        <br>
                        <section id="resend-otp" class="d-none">
                            <a href="{{ route('auth.login-resend-otp', $token) }}"
                                class="text-decoration-none text-warning fw-bold text-primary">دریافت
                                مجدد کد تایید</a>
                        </section>
                    </div>
                </div>
                @error('otp')
                    <span class="alert_required fw-bold bg-danger text-white p-1 rounded" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </span>
                @enderror

                <div class="form-button-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">ورود</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('site-assets/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
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
    @php
        $timer =
            ((new \Carbon\Carbon($otp->created_at))->addMinutes(3)->timestamp - \Carbon\Carbon::now()->timestamp) *
            1000;
    @endphp

    <script>
        var countDownDate = new Date().getTime() + {{ $timer }};
        var timer = $('#timer');
        var resendOtp = $('#resend-otp');

        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (minutes == 0) {
                timer.html('ارسال مجدد کد تایید تا ' + seconds + ' ' + 'ثانیه دیگر')
            } else {
                timer.html('ارسال مجدد کد تایید تا ' + minutes + ' ' + 'دقیقه و ' + seconds + ' ' + 'ثانیه دیگر');
            }
            if (distance < 0) {
                clearInterval(x);
                timer.addClass('d-none');
                resendOtp.removeClass('d-none');
            }

        }, 1000)
    </script>
    @include('site.alerts.sweetalert.success')
@endsection
