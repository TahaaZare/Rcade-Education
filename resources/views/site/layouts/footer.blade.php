<footer class="edu-footer footer-dark bg-image footer-style-3">
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="edu-footer-widget">
                        <div class="logo">
                            <a href="index.html">
                                <img class="logo-light" style="width: 50px;height:50px"
                                    src="{{ asset('site-assets/assets/images/logo/logo.png') }}" alt="Corporate Logo">
                            </a>
                        </div>
                        <p class="description">

                            Education Rcade

                        </p>
                        <div class="widget-information">
                            <ul class="information-list">
                                <li><span>ایمیل:</span><a href="mailto:rcadeeteam@gmail.com"
                                        target="_blank">rcadeeteam@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="edu-footer-widget explore-widget">
                        <h4 class="widget-title">پلتفرم آنلاین</h4>
                        <div class="inner">
                            <ul class="footer-link link-hover">
                                <li><a href="">دوره‌ها</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="edu-footer-widget quick-link-widget">
                        <h4 class="widget-title">لینک‌ها</h4>
                        <div class="inner">
                            <ul class="footer-link link-hover">
                                <li><a href="">تماس با ما</a></li>
                                <li><a href="{{ route('about-us') }}">درباره</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="edu-footer-widget">
                        <h4 class="widget-title">شبکه های اجتماعی</h4>
                        <div class="inner">
                            <ul class="social-share icon-transparent">
                                <li><a href="#" class="color-ig"><i class="icon-instagram"></i></a>
                                </li>
                                <li><a href="#" class="color-twitter"><i class="icon-twitter"></i></a>
                                </li>
                                <li><a href="#" class="color-yt"><i class="icon-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <p>کپی‌رایت 2024 <a href="https://ums.rcade.ir" target="_blank">
                                {{ request()->getHost() }}
                            </a> طراحی شده توسط
                            <a href="https://rcade.ir" target="_blank">Rcade.ir</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
