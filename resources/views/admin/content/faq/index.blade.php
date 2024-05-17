@extends('pwa.master')
@section('title', 'سوالات متداول')
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card p-4">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>سوالات متداول
                        <span class="badge bg-info mx-2">{{ $faqs->count() }}</span>
                    </h3>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('admin.faq.create', $user->username) }}">افزودن</a>
            </div>
            <hr>


            @foreach ($faqs as $item)
                @if ($item->status == 1)
                    <div class="accordion" id="accordionExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-{{ $item->id }}">
                                    <span class="fas fa-check-circle text-success mx-2"></span>
                                    {!! $item->question !!}
                                </button>
                            </h2>
                            <div id="accordion-{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    {!! $item->answer !!}
                                    <div class="p-3 d-inline-flex bg-transparent">
                                        <a href="{{ route('admin.faq.edit', [$user->username, $item]) }}"
                                            class="btn btn-warning mx-2 rounded">ویرایش</a>
                                        <form
                                            action="{{ route('admin.faq.delete', [$user->username, $item]) }}"method="POST">
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
                @else
                    <div class="accordion" id="accordionExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-{{ $item->id }}">
                                    <span class="fas fa-question-circle text-danger mx-2"></span>
                                    {!! $item->question !!}
                                </button>
                            </h2>
                            <div id="accordion-{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    {!! $item->answer !!}
                                    <div class="p-3 d-inline-flex bg-transparent">
                                        <a href="{{ route('admin.faq.edit', [$user->username, $item]) }}"
                                            class="btn btn-warning mx-2 rounded">ویرایش</a>
                                        <form
                                            action="{{ route('admin.faq.delete', [$user->username, $item]) }}"method="POST">
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
                @endif
            @endforeach


        </div>
    </div>

@endsection
