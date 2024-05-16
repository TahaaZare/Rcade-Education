@extends('admin.layouts.master')
@section('title', 'سوالات متداول')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="header">
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="#" onclick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('admin.faq.create', $user->username) }}">افزودن</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                @if ($faqs->count() > 0)
                    <div class="row">
                        @foreach ($faqs as $item)
                            <div class=" col-4 card">
                                @if ($item->status == 1)
                                    <div class="card" style="border: 2px solid green">
                                        <div class="header">
                                            <h2>
                                                <span class="text-xs text-white badge bg-success font-weight-bold">
                                                    تایید شده
                                                </span>
                                            </h2>
                                        </div>
                                        <div class="body p-7">
                                            سوال :
                                            {{ $item->question }}
                                            <hr>
                                            جواب :
                                            {!! $item->answer !!}
                                        </div>
                                        <div class="p-3 d-inline-flex">
                                            <a href="{{ route('admin.faq.edit', [$user->username, $item]) }}"
                                                class="btn btn-warning mx-2 rounded">ویرایش</a>
                                            <form action="{{ route('admin.faq.delete', [$user->username, $item]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn  mx-2 btn-danger rounded">
                                                    حذفــ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="card" style="border: 2px solid red">
                                        <div class="header">
                                            <h2>
                                                <span class="text-xs text-white badge bg-danger font-weight-bold">
                                                    در انتظار تایید . . .
                                                </span>
                                            </h2>
                                        </div>
                                        <div class="body p-7">
                                            سوال :
                                            {{ $item->question }}
                                            <hr>
                                            جواب :
                                            {!! $item->answer !!}
                                        </div>
                                        <div class="p-3 d-inline-flex">
                                            <a href="{{ route('admin.faq.edit', [$user->username, $item]) }}"
                                                class="btn btn-warning mx-2 rounded">ویرایش</a>
                                            <form action="{{ route('admin.faq.delete', [$user->username, $item]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn  mx-2 btn-danger rounded">
                                                    حذفــ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="alert alert-warning rounded">
                        آیتمی یافت نشـد !
                    </p>
                @endif
            </div>
        </div>
    </div>

@endsection
