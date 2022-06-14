<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.currency') . ' #' . $currency->id }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admins.currencies.index') }}">{{ __('web.currencies') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.currency') . ' #' . $currency->id }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('web.editing') . ' ' . __('web.currency') . ' #' . $currency->id }}</h2>
                <p class="section-lead">{{ __('web.editing_form_note') }}</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.editing_form') }}</h4>
                            </div>
                            <form action="{{ route('admins.currencies.update', $currency->id) }}" method="post" >
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- Form Title -->
                                            <div class="card-body col-12 col-md-6 col-lg-6">
                                                <label for="title">{{ __('web.title') }}</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                       name="title" value="{{ old('title', $currency->title) }}" id="title" required>
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- Form Symbol -->
                                            <div class="card-body col-12 col-md-6 col-lg-6">
                                                <label for="symbol">{{ __('web.symbol') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"> $ </div>
                                                    </div>
                                                    <input type="text" class="form-control @error('symbol') is-invalid @enderror"
                                                           name="symbol" value="{{ old('symbol', $currency->symbol) }}" id="symbol" required>
                                                    @error('symbol')
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
                                            <!-- Form Symbol -->
                                            <div class="card-body col-12 col-md-6 col-lg-6">
                                                <label for="rate">{{ __('web.rate') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"> <i class="fas fa-percent"></i> </div>
                                                    </div>
                                                    <input type="text" class="form-control @error('rate') is-invalid @enderror"
                                                           name="rate" value="{{ old('rate', $currency->rate) }}" id="rate" required>
                                                    @error('rate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Form Title -->
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="active" value="1" {{ $currency->active ? 'checked' : '' }} class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('web.active') }}</span>
                                            </label>
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
</x-backend-layout>
