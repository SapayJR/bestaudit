<x-frontend-layout>
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <x-jet-application-logo></x-jet-application-logo>
                    <h4 class="text-dark font-weight-normal">{{ __('web.welcome_to') }} <span class="font-weight-bold">{{ config('app.name') }}</span></h4>
                    <p class="text-muted">Before you get started, you must login if you don't already have an account.</p>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('web.email') }}</label>
                            <input id="email" type="email" class="form-control" :value="old('email')" name="email" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                {{ mb_strtolower(__('web.please_fill_in_your') .  __('web.email')) }}
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">{{ __('web.password') }}</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ mb_strtolower(__('web.please_fill_in_your') .  __('web.password')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                <label class="custom-control-label" for="remember-me">{{ __('web.remember_me') }}</label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                           {{-- <a href="auth-forgot-password.html" class="float-left mt-3">
                                Forgot Password?
                            </a>--}}
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                {{ __('web.login') }}
                            </button>
                        </div>

                        {{--<div class="mt-5 text-center">
                            Don't have an account? <a href="auth-register.html">Create new one</a>
                        </div>--}}
                    </form>

                   {{-- <div class="text-center mt-5 text-small">
                        Copyright &copy; Your Company. Made with 💙 by Stisla
                        <div class="mt-2">
                            <a href="#">Privacy Policy</a>
                            <div class="bullet"></div>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('/backend/img/unsplash/login-bg.jpg') }}">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-5 font-weight-bold">{{ 'Ваши финансы в надежных руках' }}</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Tashkent, Uzbekistan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

