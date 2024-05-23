@extends('pwa.master')
@section('title', "پروفایل $user->username")
@section('app-menu')
    @include('pwa.app-button-menu')
@endsection
@section('header')
    @include('pwa.header')
@endsection
@section('content')

    <div class="section mt-2">
        <div class="profile-head">
            <div class="avatar">
                <img src="{{ asset($user->profile) }}" alt="avatar" class="imaged shadow w64 rounded">
            </div>
            <div class="in">
                <h3 class="name">{{ $user->display_name ?? "-" }}</h3>
                <h5 class="subtext" dir="ltr">
                    @php
                        $username = "@$user->username";
                    @endphp
                    {{ $username }}
                </h5>
            </div>
        </div>
    </div>

    <div class="section full mt-2">
        <div class="profile-stats ps-2 pe-2">
            <a href="#" class="item">
                <strong>{{ $user_blogs->count() }}</strong>مقالات
            </a>

        </div>
    </div>

    <div class="section mt-1 mb-2">
        <div class="profile-info">
            <div class="bio in">
                {!! $user->bio ?? 'بیوگرافی وارد نشده ' !!}
            </div>
        </div>
    </div>

    <div class="section full">
        <div class="wide-block transparent p-0">
            <ul class="nav nav-tabs lined iconed" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active" data-bs-toggle="tab" href="#feed" role="tab" aria-selected="false">
                        <i class="fas fa-newspaper fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 p-2 pt-0 pb-0">
                    <div class="row">
                        @foreach ($user_blogs as $item)
                            <div class="col-4 mb-2">
                                <a data-bs-toggle="offcanvas" href="#offcanvas-bottom-{{ $item->id }}">
                                    <img src="{{ asset($item->image) }}" alt="image" class="imaged h-50 w-100">
                                </a>
                                <div class="offcanvas offcanvas-bottom" tabindex="-1"
                                    id="offcanvas-bottom-{{ $item->id }}">
                                    <div class="offcanvas-header">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="offcanvas-title">مقاله : {{ $item->title }}</h5>
                                        </div>
                                        <a href="#" class="offcanvas-close" data-bs-dismiss="offcanvas">
                                            <ion-icon name="close-outline"></ion-icon>
                                        </a>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div>
                                            {!! Str::limit($item->description, $limit = 300, $end = ' . . . ') !!}
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('show-blog', $item->slug) }}"
                                                class="btn btn-outline-warning mx-1">مشاهده</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- * feed -->
        </div>
    </div>
    <!-- * tab content -->

@endsection

@section('script')
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        const watchdog = new CKSource.EditorWatchdog();
        window.watchdog = watchdog;
        watchdog.setCreator((element, config) => {
            return CKSource.Editor
                .create(element, config)
                .then(editor => {
                    return editor;
                })
        });

        watchdog.setDestructor(editor => {
            return editor.destroy();
        });

        watchdog.on('error', handleError);

        watchdog
            .create(document.querySelector('.description'), {
                licenseKey: '',
            })
            .catch(handleError);

        function handleError(error) {
            console.error(error);
        }
    </script>
@endsection
