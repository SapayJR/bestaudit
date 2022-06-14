 <div class="navbar-bg"></div>
 <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            <div class="search-element text-white font-weight-bold">
               {{ __('web.server_time') . ': ' . now()->format('d/m/Y H:i:s') }}
            </div>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('backend/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">{{ __('web.registered_date') . ': ' . auth()->user()->created_at->translatedFormat('j F, Y') }}</div>
                    <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> {{ __('web.profile') }}
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> {{ __('web.settings') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                       data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_leave_us')}}?"
                       data-confirm-yes="event.preventDefault();
                                                    document.getElementById('logout-form').submit()"
                    >
                        <i class="fas fa-sign-out-alt"></i> {{ __('web.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </nav>

