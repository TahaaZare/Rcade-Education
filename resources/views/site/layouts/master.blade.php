<!DOCTYPE html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    @include('site.layouts.meta')
    @yield('meta-tags')
    @include('site.layouts.head-tag')
    @yield('head-tag')
</head>

<body class="sticky-header">

    @include('site.layouts.loader')

    <div id="main-wrapper" class="max-w-full mx-auto main-wrapper">
        @include('site.layouts.header')
        @yield('content')
        @include('site.layouts.footer')
    </div>

    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    @include('site.layouts.script')
    @include('site.alerts.sweetalert.error')
    @include('site.alerts.sweetalert.success')
    @include('site.alerts.sweetalert.warning')
    @yield('scripts')
</body>

</html>
