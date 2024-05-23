@extends('pwa.master')
@section('title', "ویرایش ")
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
                <form action="{{ route('admin.rule.update', [$user->username, $rule]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="clearfix row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" required name="description" class="form-control description" placeholder="متن . . .">{{ old('description', $rule->description) }}</textarea>
                                </div>
                            </div>
                            @error('description')
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
