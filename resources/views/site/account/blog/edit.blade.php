@extends('pwa.master')
@section('title', "ویرایش مقاله : $blog->title")
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

                <form action="{{ route('user-update-blog', [$user->username, $blog]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="clearfix row">
                        <div class="d-flex justify-content-center my-3">
                            <img src="{{ asset($blog->image) }}" style="height: 200px;width: 300px;border-radius: 1rem"
                                alt="">
                        </div>
                        <div class="col-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="title">عنوان</label>
                                    <input type="text" class="form-control" id="name" name="title"
                                        value="{{ old('title', $blog->title) }}" placeholder="عنوان را وارد کنید">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('title')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="category_id">دسته بندی</label>
                                    <select name="category_id" class="form-control">
                                        <option disabled selected>انتخاب دسته</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('category_id', $blog->category_id) == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('category_id')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group basic">
                                <div class="form-line">
                                    <textarea type="text" name="description" class="form-control description" placeholder="متن . . .">{{ old('description', $blog->description) }}</textarea>
                                </div>
                            </div>
                            @error('description')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="custom-file-upload" id="fileUpload1">
                                <input type="file" name="image" id="fileuploadInput"
                                    accept=".png, .jpg, .jpeg, .webp, .gif">
                                <label for="fileuploadInput">
                                    <span>
                                        <strong>
                                            <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
                                                aria-label="cloud upload outline"></ion-icon>
                                            <i>برای آپلود ضربه بزنید</i>
                                        </strong>
                                    </span>
                                </label>
                            </div>
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
    {!! JsValidator::formRequest('App\Http\Requests\Site\Account\Blog\UpdateUserBlogRequest') !!}

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
