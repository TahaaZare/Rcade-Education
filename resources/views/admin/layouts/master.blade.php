<!DOCTYPE html>
<html lang="en">

<head>
    @yield('meta-tags')
    @include('admin.layouts.meta-tags')
    @yield('head-tags')
    @include('admin.layouts.head-tags')
</head>

<body class="light rtl">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{ asset('admin-assets/assets/images/loading.png') }}" alt="admin">
            </div>
            <p>لطفا صبر کنید...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    @include('admin.layouts.top-bar')
    <div>
        @include('admin.layouts.left-side')
    </div>
    <section class="content">
        <div class="container-fluid">

            @yield('content')

        </div>
    </section>
    @yield('script')
    @include('admin.layouts.script')
    @include('site.alerts.sweetalert.error')
    @include('site.alerts.sweetalert.success')
    @include('site.alerts.sweetalert.warning')
</body>
