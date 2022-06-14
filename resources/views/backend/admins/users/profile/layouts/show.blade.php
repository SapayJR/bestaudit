<x-backend-layout>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admins.users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('web.profile') . ' ' . $user->firstname. ' ' . $user->lastname }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admins.users.index') }}">{{ __('web.users') }}</a></div>
                    <div class="breadcrumb-item active">{{ $user->firstname }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ __('web.user_general_settings') }}</h2>
                <p class="section-lead">
                    {{ __('web.user_general_settings_description') }}
                </p>

                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.settings_list') }}</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admins.users.profile.personal', $user->uuid) }}" class="nav-link {{ Route::currentRouteName() == 'admins.users.profile.personal' ? 'active' : '' }}">{{ __('web.personal_information') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admins.users.profile.permission', $user->uuid) }}" class="nav-link {{ Route::currentRouteName() == 'admins.users.profile.permission' ? 'active' : '' }}">{{ __('web.role_and_permissions') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admins.users.profile.company', $user->uuid) }}" class="nav-link {{ Route::currentRouteName() == 'admins.users.profile.company' ? 'active' : '' }}">{{ __('web.company_information') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admins.users.profile.security', $user->uuid) }}" class="nav-link {{ Route::currentRouteName() == 'admins.users.profile.security' ? 'active' : '' }}">{{ __('web.security') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ $user->profile_photo_url }}" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">{{ __('web.companies_count') }}</div>
                                        <div class="profile-widget-item-value">{{ __('0') }}</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">{{ __('web.files_count') }}</div>
                                        <div class="profile-widget-item-value">{{ __('0') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">
                                    {{ $user->firstname. ' ' . $user->lastname }}
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> {{ __('web.'.$user->role) }}
                                    </div>
                                </div>
                            </div>
                            @yield('user-profile')
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <x-slot name="javascript">
        <script src="{{ asset('backend/js/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('swal',function(e){
                Swal.fire(e.detail);
            });
            $(".pwstrength").pwstrength();

        </script>
    </x-slot>
</x-backend-layout>
