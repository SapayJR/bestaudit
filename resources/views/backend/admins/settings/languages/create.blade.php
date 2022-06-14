<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.language') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admins.languages.index') }}">{{ __('web.languages') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.language') }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('web.adding_new') . ' ' . __('web.language') }}</h2>
                <p class="section-lead">{{ __('web.adding_form_note') }}</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.adding_form') }}</h4>
                            </div>
                            <form action="{{ route('admins.languages.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- Form Title -->
                                            <div class="card-body col-12 col-md-6 col-lg-6">
                                                <label for="title">{{ __('web.title') }}</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                       name="title" value="{{ old('title') }}" id="title"
                                                       placeholder="{{ __('web.example') . ': English'  }}" required>
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- Form Symbol -->
                                            <div class="card-body col-12 col-md-6 col-lg-6">
                                                <label for="locale">{{ __('web.locale') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"> <i class="fas fa-globe"></i> </div>
                                                    </div>
                                                    <input type="text" class="form-control @error('locale') is-invalid @enderror"
                                                           name="locale" value="{{ old('locale') }}" id="locale"
                                                           placeholder="{{ __('web.example') . ': en'  }}" required>
                                                    @error('locale')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <!-- Form Backward -->
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="backward" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('web.backward') }}</span>
                                            </label>

                                            <!-- Form Default -->
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="default" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('web.default') }}</span>
                                            </label>

                                            <!-- Form Active -->
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="active" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('web.active') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">{{ __('web.language_flag') }}</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">{{ __('web.choose_file') }}</label>
                                                <input type="file" name="img" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script src="{{ asset('backend/js/page/features-post-create.js') }}"></script>
    </x-slot>
</x-backend-layout>
