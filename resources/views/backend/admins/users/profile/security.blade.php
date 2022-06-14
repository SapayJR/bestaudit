@extends('backend.admins.users.profile.layouts.show')

@section('user-profile')
    <div class="card-body">
        <div class="card-header">
            <h4>{{ __('web.change_password') }}</h4>
        </div>
        <div class="card-body col-12 col-md-8 col-lg-8">
            <form action="{{ route('admins.users.profile.password.update', $user->uuid) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="current_password">{{ __('web.current_password') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password">
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('web.new_password') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" id="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('web.new_password_confirmation') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-md-left">
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('web.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
