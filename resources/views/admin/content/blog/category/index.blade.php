@extends('pwa.master')
@section('title', 'دسته بندی مقالات')
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card p-4">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>دسته بندی مقالات
                        <span class="badge bg-info mx-2">{{ $categories->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary"
                    href="{{ route('admin.blog-category.create', $user->username) }}">افزودن</a>
            </div>
            <hr>
            @foreach ($categories as $item)
                    <div class="accordion" id="accordionExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-{{ $item->id }}">
                                    <span class="fas fa-check-circle text-success mx-2"></span>
                                    {!! $item->name !!}
                                </button>
                            </h2>
                            <div id="accordion-{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    <div class="p-3 d-inline-flex bg-transparent">
                                        <a href="{{ route('admin.blog-category.edit', [$user->username, $item]) }}"
                                            class="btn btn-warning mx-2 rounded">ویرایش</a>
                                        <form
                                            action="{{ route('admin.blog-category.delete', [$user->username, $item]) }}"method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn  mx-2 btn-danger rounded">
                                                حذفــ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach


        </div>
    </div>

@endsection
