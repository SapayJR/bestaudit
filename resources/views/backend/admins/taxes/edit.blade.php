<x-backend-layout>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/select/css/select.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/jquery-selectric/selectric.css') }}">
    </x-slot>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.taxes') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admins.categories.index') }}">{{ __('web.categories') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.category') }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('web.adding_new') . ' ' . strtolower(__('web.category')) }}</h2>
                <p class="section-lead">{{ __('web.adding_form_note') }}</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.adding_form') }}</h4>
                            </div>
                            <form action="{{ route('admins.taxes.update', $tax->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <!-- Form Title -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="card-header">
                                                <label>{{ __('web.title') }} <span class="text-danger font-weight-bold">*</span></label>
                                            </div>
                                            @foreach (config('translatable.locales') as $index => $lang)
                                                <div class="card-body col-12 col-md-{{ count(config('translatable.locales')) > 2 ?  12/2 : 12/count(config('translatable.locales')) }} col-lg-{{ 12/count(config('translatable.locales')) }}">
                                                    <label for="title-{{ $lang }}">{{ $lang }}</label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                           name="title[{{ $lang }}]" value="{{ old('title:'.$lang, isset($tax->translations[$index]) ? $tax->translations[$index]->title : '') }}" id="title-{{ $lang }}" required >
                                                    @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">

                                            <div class="card-body col-12 col-md-4 col-lg-4">
                                                <label for="keywords">Tax</label>
                                                <input type="text" name="tax_rate" value="{{ $tax->tax_rate }}" placeholder="%" class="form-control invoice-input" id="keywords">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="card-body">
                                    <div class="form-group">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">{{ __('web.category_logo') }}</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">{{ __('web.choose_file') }}</label>
                                                <input type="file" name="img" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="card-footer text-left">
                                    <button type="submit" class="btn btn-primary">{{ __('web.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-slot name="javascript">
        <script src="{{ asset('backend/js/modules/upload-preview/jquery.uploadPreview.min.js') }}"></script>
        <script src="{{ asset('backend/js/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('backend/js/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('backend/js/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('backend/js/page/features-post-create.js') }}"></script>
        <script>
            $("select").selectric();
            $(".inputtags").tagsinput('items');
        </script>
    </x-slot>
</x-backend-layout>
