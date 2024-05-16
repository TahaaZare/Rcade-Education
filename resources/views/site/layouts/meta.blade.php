<meta charset="utf-8">
<!-- Meta Data -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title', $setting->title ?? "سایت آموزشی Rcade")</title>
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="keywords" content="@yield('meta_keywords', $setting->meta_key ?? "سامانه مدیریت دانشگاهی,سایت آموزشی Rcade")">
<meta name="description" content="@yield('meta_description', $setting->meta_description ?? "سامانه مدیریت دانشگاهی,سایت آموزشی Rcade")">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
