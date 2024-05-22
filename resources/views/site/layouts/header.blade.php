<header class="edu-header header-style-1 header-fullwidth">
    @php
        $email = 'rcadeeteam@gmail.com';
    @endphp
    <div class="header-top-bar">
        <div class="container-fluid">
            <div class="header-top">
                <div class="header-top-right">
                    <ul class="header-info">
                        @auth
                            @php
                                $user = auth()->user();
                            @endphp
                            <li><a href="{{ route('admin.home', $user->username) }}">admin</a></li>
                            <li><a href="{{ route('user.profile', $user->username) }}">profile</a></li>
                        @endauth
                        <li><a href="#">ورود</a></li>
                        <li><a href="#">ثبت‌نام</a></li>
                        <li><a href="mailto:{{ $email }}" target="_blank"><i class="icon-envelope"></i>ایمیل:
                                {{ $email }}</a></li>
                        <li class="social-icon">
                            <a href="#"><i class="icon-facebook"></i></a>
                            <a href="#"><i class="icon-instagram"></i></a>
                            <a href="#"><i class="icon-twitter"></i></a>
                            <a href="#"><i class="icon-linkedin2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="edu-sticky-placeholder"></div>
    <div class="header-mainmenu">

        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <div class="logo">
                        <a href="index.html">
                            <img class="logo-light" style="width: 100px;height:100px"
                                src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
                            <img class="logo-dark" style="width: 100px;height:100px"
                                src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">

                        </a>
                    </div>
                </div>
                <div class="header-mainnav">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li><a href="{{ route('home') }}">صفحه اصلی</a></li>
                            <li><a href="{{ route('courses') }}">دوره ها</a></li>
                            <li><a href="{{ route('blogs') }}">مقالات</a></li>
                            <li class="has-droupdown"><a href="#">لینک های مفید</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('about-us') }}" wire:navigate>درباره ما</a></li>
                                    <li><a href="" wire:navigate>تماس با ما</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <ul class="header-action">
                        <li class="mobile-menu-bar d-block d-xl-none">
                            <button class="hamberger-button">
                                <i class="icon-54"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-mobile-menu">

        <div class="inner">
            <div class="header-top">
                <div class="logo">
                    <a href="index.html">
                        <img class="logo-light" style="width: 100px;height:100px"
                            src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
                        <img class="logo-dark" style="width: 100px;height:100px"
                            src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
                    </a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="icon-73"></i>
                    </button>
                </div>
            </div>
            <ul class="mainmenu">
                <li><a href="{{ route('home') }}">صفحه اصلی</a></li>
                <li class="has-droupdown"><a href="#">لینک های مفید</a>
                    <ul class="submenu">
                        <li><a href="">درباره ما</a></li>
                        <li><a href="">تماس با ما</a></li>
                    </ul>
                </li>
                <li class="has-droupdown"><a href="#">ورود به حساب</a>
                    <ul class="submenu">
                        @guest
                            <li><a href="">ورود</a></li>
                        @endguest
                        @auth
                            @php
                                $user = auth()->user();
                            @endphp

                        @endauth
                    </ul>

                </li>
            </ul>
        </div>
    </div>
    <!-- Start Search Popup  -->
    <div class="edu-search-popup">
        <div class="content-wrap">
            <div class="site-logo">
                <img class="logo-light" style="width: 100px;height:100px"
                    src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
                <img class="logo-dark" style="width: 100px;height:100px"
                    src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
            </div>
            <div class="close-button">
                <button class="close-trigger"><i class="icon-73"></i></button>
            </div>
        </div>
    </div>
    <!-- End Search Popup  -->
</header>
