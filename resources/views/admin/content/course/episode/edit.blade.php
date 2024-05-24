@extends('pwa.master')
@section('title', 'ویرایش ویدیو')
@section('app-menu')
    @include('pwa.app-button-menu')
@endsection
@section('header')
    @include('pwa.header')
@endsection
@section('content')
    <div class="clearfix row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="p-3 card">
                <form action="{{ route('admin.course-episode.update', [$user->username, $course, $sesson, $episode]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" value="{{ $user->id }}" name="create_by">
                    <div class="clearfix row">
                        <div class="col-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="name">عنوان</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $episode->name) }}" placeholder="عنوان را وارد کنید">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('name')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">وضعیت نمایش</label>
                                    <select name="status" class="form-control">
                                        <option disabled selected>انتخاب وضعیت</option>
                                        <option value="0" @if (old('status', $episode->status) == 0) selected @endif>
                                            در انتظار تایید . . .
                                        </option>
                                        <option value="1" @if (old('status', $episode->status) == 1) selected @endif>
                                            تایید شده
                                        </option>
                                        <option value="2" @if (old('status', $episode->status) == 2) selected @endif>
                                            رد شـده !
                                        </option>
                                    </select>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('status')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group basic">
                                <div class="form-line">
                                    <textarea type="text" name="description" class="form-control description" placeholder="متن . . .">{{ old('description', $episode->description) }}</textarea>
                                </div>
                            </div>
                            @error('description')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="custom-file-upload" id="fileUpload1">
                            <input type="file" name="file" id="fileuploadInput" accept=".mp4, .mov, .ogg, .qt, .pdf">
                            <label for="fileuploadInput">
                                <span>
                                    <strong>
                                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
                                            aria-label="cloud upload outline"></ion-icon>
                                        <i>برای آپلود ضربه بزنید</i>
                                    </strong>
                                </span>
                            </label>
                            @error('file')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="col-12 my-4">
                            <button type="submit" class="btn btn-block btn-primary">
                                ثبت
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Content\Course\Episode\UpdateEpisodeAdminRequest') !!}

@endsection
