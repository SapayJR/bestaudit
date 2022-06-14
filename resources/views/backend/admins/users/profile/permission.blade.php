@extends('backend.admins.users.profile.layouts.show')

@section('user-profile')
    <div class="card-body">
        <div class="card-header">
            <h4>{{ __('web.roles_list') }}</h4>
        </div>
        <div class="card-body p-0">
            <livewire:backend.admin.change-user-role :user="$user"/>
        </div>
    </div>
@endsection
