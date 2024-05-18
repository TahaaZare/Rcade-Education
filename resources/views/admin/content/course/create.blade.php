@extends('pwa.master')
@section('title', 'افزودن دوره جدید')
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
                <form action="{{ route('admin.course.store', $user->username) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="clearfix row">
                        <div class="col-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="name">عنوان</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="عنوان را وارد کنید">
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
                                    <label class="form-label" for="master_id">استاد</label>
                                    <select name="master_id" class="form-control" id="">
                                        @foreach ($masters as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('master_id') == $item->id) seleted @endif>
                                                {{ $item->display_name ?? $item->username }}
                                            </option>
                                        @endforeach
                                    </select>
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

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">وضعیت نمایش</label>
                                    <select name="status" class="form-control">
                                        <option disabled selected>انتخاب وضعیت</option>
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
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
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">وضعیت دوره</label>
                                    <select name="course_status" class="form-control">
                                        <option disabled selected>انتخاب وضعیت</option>
                                        <option value="0" @if (old('course_status') == 0) selected @endif>به زودی . .
                                            .</option>
                                        <option value="1" @if (old('course_status') == 1) selected @endif>در حال ظبط
                                            ⏺️</option>
                                        <option value="2" @if (old('course_status') == 2) selected @endif>در حال
                                            برگزاری</option>
                                        <option value="3" @if (old('course_status') == 3) selected @endif>به اتمام
                                            رسیده</option>

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
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">سختی دوره</label>
                                    <select name="course_level" class="form-control">
                                        <option disabled selected>انتخاب سختی</option>
                                        <option value="0" @if (old('course_level') == 0) selected @endif>مقدماتی
                                        </option>
                                        <option value="1" @if (old('course_level') == 1) selected @endif>معمولی
                                        </option>
                                        <option value="2" @if (old('course_level') == 2) selected @endif>سخت
                                        </option>
                                        <option value="3" @if (old('course_level') == 3) selected @endif>پیشرفته
                                        </option>
                                    </select>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('course_level')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('slug')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="category_id">دسته بندی</label>
                                    <select name="category_id" class="form-control">
                                        <option disabled selected>انتخاب دسته</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('category_id') == $item->id) seleted @endif>{{ $item->name }}
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
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="status">قیمت</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}" id="">
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
                                <div class="input-wrapper">
                                    <label class="form-label" for="tags">تگ هـا</label>
                                    <input type="text" placeholder="تگ ها را با , از هم جدا کنید"
                                        value="{{ old('tags') }}" class="form-control" name="tags" id="tags">
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
                                    <textarea type="text" name="summary" class="form-control " placeholder="خلاصه . . .">{{ old('summary') }}</textarea>
                                </div>
                            </div>
                            @error('summary')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="form-group basic">
                                <div class="form-line">
                                    <textarea type="text" name="description" class="form-control description" placeholder="متن . . .">{{ old('description') }}</textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Content\Course\StoreCourseRequest') !!}

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
    <script>
        $(document).ready(function() {

            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            });
        });
    </script>
@endsection
