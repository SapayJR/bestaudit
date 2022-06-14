<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <x-jet-application-logo></x-jet-application-logo>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">{{ config('app.name')[0] }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('web.dashboard') }}</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('web.dashboard') }}</span></a>
            </li>
        </ul>

        <!-- USERS & SELLER MENU -->
        @hasrole('user|seller|moderator')
            <ul class="sidebar-menu">
                <li class="menu-header">{{ __('web.management') }}</li>

                @hasrole('seller')
                <ul class="sidebar-menu">
                    <li class="menu-header">{{ __('web.users') }}</li>
                    <li class="nav-item">
                        <a href="{{ route('auditor.users.index') }}" class="nav-link"><i class="fas fa-users"></i><span>{{  __('web.shop_users') }}</span></a>
                    </li>
                </ul>
                @endhasrole
            </ul>
        @endhasrole

        <!-- ADMIN & MANAGER MENU -->
        @hasanyrole('admin')
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('web.users') }}</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>{{ __('web.users') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admins.users.index') }}">{{ __('web.system_users') }}</a></li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('web.management') }}</li>

            <li class="nav-item">
                <a href="{{ route('admins.categories.index') }}" class="nav-link"><i class="fas fa-list"></i><span>{{ __('web.categories') }}</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admins.companies.index') }}" class="nav-link"><i class="fa fa-building"></i><span>Companies</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admins.taxes.index') }}" class="nav-link"><i class="fas fa-percent"></i><span>Taxes</span></a>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('web.settings') }}</li>
            <li class="nav-item">
                <a href="{{ route('admins.settings.translations') }}" class="nav-link"><i class="fas fa-language"></i><span>{{ __('web.translation_manager') }}</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admins.settings.cache.clear') }}" class="nav-link"><i class="fas fa-broom"></i><span>{{ __('web.cache_clear') }}</span></a>
            </li>
        </ul>
        @endhasanyrole
    </aside>
</div>
