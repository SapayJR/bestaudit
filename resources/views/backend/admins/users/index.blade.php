<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.users_list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.users') }}</div>
                </div>
            </div>

            <div class="section-body">
                @hasrole('admin')
                    <a class="btn btn-primary" href="{{ route('admins.users.create') }}">
                        {{ __('web.add_new') }}
                    </a>
                @endhasrole
                <h4 class="section-title">
                    <p class="section-lead">{{ __('web.system_users_management') }}</p>
                </h4>
                <div class="row">
                    <div class="col-12">
                        <livewire:backend.admin.user-table />
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-backend-layout>
