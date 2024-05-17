@extends('pwa.master')
@section('title', "ویرایش سوال : $faq->question")
@section('content')
    <div class="clearfix row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="p-3 card">
                <form action="{{ route('admin.faq.update', [$user->username, $faq]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="clearfix row">
                        <div class="col-sm-6">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="question">سوال</label>
                                    <input type="text" class="form-control" id="question" name="question"
                                        value="{{ old('question', $faq->question) }}" placeholder="سوال را وارد کنید">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle" role="img" class="md hydrated"
                                            aria-label="close circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            @error('question')
                                <p class="p-4 m-1 bg-yellow-300 rounded">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-sm-6  my-1">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="form-label" for="question">سوال</label>
                                    <select name="status" class="form-control">
                                        <option disabled selected>انتخاب وضعیت</option>
                                        @if ($faq->status == 1)
                                            <option selected value="1">فعال</option>
                                            <option value="0">غیرفعال</option>
                                        @else
                                            <option value="1">فعال</option>
                                            <option value="0" selected>غیرفعال</option>
                                        @endif

                                    </select> <i class="clear-input">
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
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" name="answer" class="form-control description" placeholder="جواب . . .">{{ old('answer', $faq->answer) }}</textarea>
                                </div>
                            </div>
                            @error('answer')
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Content\Faq\StoreFaqRequest') !!}

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
