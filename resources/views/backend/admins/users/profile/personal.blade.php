@extends('backend.admins.users.profile.layouts.show')

@section('user-profile')
    <div class="card-body">
        <h6>{{ __('web.personal_information') }}</h6>
        <div class="row">
            <div class="card-header col-md-6">
                <span class="text-dark">{{ __('web.email') }}:</span>
            </div>
            <div class="card-header col-md-6">
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-mail-bulk"></i></span>
                    </label>
                    {{ $user->email }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-header col-md-6">
                <span class="text-dark">{{ __('web.birthday') }}:</span>
            </div>
            <div class="card-header col-md-6">
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-birthday-cake"></i></span>
                    </label>
                    {{ $user->birthday?->format('d/m/Y') ?? __('web.not_specified')  }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-header col-md-6">
                <span class="text-dark">{{ __('web.gender') }}:</span>
            </div>
            <div class="card-header col-md-6">
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas  fa-male "></i></span>
                    </label>
                    {{ __('web.'.$user->gender)}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-header col-md-6">
                <span class="text-dark">{{ __('web.phone') }}:</span>
            </div>
            <div class="card-header col-md-6">
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-phone"></i>   </span>
                    </label>
                    {{ $user->phone }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-header col-md-6">
                <span class="text-dark">{{ __('web.verified_date') }}:</span>
            </div>
            <div class="card-header col-md-6">
                <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-calendar"></i></span>
                    </label>
                    {{ $user->phone_verified_at?->format('d/m/Y H:i:s') ?? __('web.not_specified') }}
                </div>
            </div>
        </div>
    </div>
@endsection
