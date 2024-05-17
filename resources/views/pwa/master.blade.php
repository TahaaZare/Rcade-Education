<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>@yield('title', 'سایت آموزشی Rcade')</title>
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="description" content="@yield('meta_description', '')">
    @include('pwa.head-tag')
    @yield('head-tag')
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->
    <div id="appCapsule">
        @yield('header')
        @yield('content')
    </div>
    <!-- * App Capsule -->

    @yield('app-menu')
    <!-- App Sidebar -->
    @include('pwa.offcanvas')
    <!-- * App Sidebar -->

    @include('pwa.script')
    @yield('script')
    @include('site.alerts.sweetalert.success')
    @include('site.alerts.sweetalert.warning')
    @yield('script')
</body>

</html>
