<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.add_new_user') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admins.users.index') }}">{{ __('web.users') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.user') }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ __('web.adding_new') . ' ' . strtolower(__('web.category')) }}</h2>
                <p class="section-lead">{{ __('web.adding_form_note') }}</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.adding_form') }}</h4>
                            </div>
                            <form action="{{ route('admins.users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- Form Title -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">

                                                <div class="card-header">
                                                    <label for="firstname">{{ __('web.firstname') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </div>

                                                <div class="card-body">
                                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                                           name="firstname" value="{{ old('firstname') }}" id="firstname" required autocomplete="off">
                                                    @error('firstname')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="card-header">
                                                    <label for="lastname">{{ __('web.lastname') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </div>
                                                <div class="card-body">
                                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                                           name="lastname" value="{{ old('lastname') }}" id="lastname" required autocomplete="off">
                                                    @error('lastname')
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
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="card-header">
                                                    <label for="firstname">{{ __('web.email') }}</label>
                                                </div>
                                                <div class="card-body">
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" id="email" autocomplete="off">
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message  }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="card-header">
                                                    <label for="phone">{{ __('web.phone') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </div>
                                                <div class="card-body">
                                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                           name="phone" value="{{ old('phone') }}" id="phone" required>
                                                    @error('phone')
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
                                            <!-- Parent Category Form -->
                                            <div class="card-body col-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="gender">{{ __('web.gender') }}</label>
                                                    <div class="selectgroup selectgroup-pills">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="male" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">{{ __('web.male') }}</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="gender" value="female" class="selectgroup-input">
                                                            <span class="selectgroup-button">{{ __('web.female') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Category Tags Form -->
                                            <div class="card-body col-12 col-md-4 col-lg-4">
                                                <label for="birthday">{{ __('web.birthday') }}</label>
                                                <input type="date" name="birthday" class="form-control" id="birthday">
                                            </div>

                                            <div class="card-body col-12 col-md-4 col-lg-4">
                                            <table class="table table-striped">
                                                <thead>
                                                    <label for="role"  class="form-label">{{ __('web.role') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th class="text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <i class="fas fa-check"></i>
                                                        </div>
                                                    </th>
                                                    <th>{{ __('web.title') }}</th>
                                                </tr>
                                                @foreach($roles as $role)
                                                    <tr>
                                                    <td class="text-center">
                                                        <div class="custom-radio custom-control">
                                                            <input type="radio" name="role" value="{{ $role->name }}" class="custom-control-input" id="{{ $role->name }}"  @if($role->name == 'client') checked @endif>
                                                            <label for="{{ $role->name }}" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>{{ __('web.' . $role->name) }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="card-header">
                                                    <label for="password">{{ __('web.password') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </div>
                                                <div class="card-body">
                                                    <input type="password" class="form-control pwstrength @error('password') is-invalid @enderror"  data-indicator="pwindicator"
                                                           name="password" value="{{ old('password') }}" id="password" required autocomplete="off">
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    <div id="pwindicator" class="pwindicator">
                                                        <div class="bar"></div>
                                                        <div class="label"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="card-header">
                                                    <label for="password_confirmation">{{ __('web.password_confirmation') }} <span class="text-danger font-weight-bold">*</span></label>
                                                </div>
                                                <div class="card-body">
                                                    <input type="password" class="form-control"
                                                           name="password_confirmation" id="password_confirmation" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <!-- Form Default -->
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="active" value="1" class="custom-switch-input" checked>
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
    <x-slot name="javascript">
        <script src="{{ asset('backend/js/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
        <script>
            $(".pwstrength").pwstrength();
        </script>
    </x-slot>
</x-backend-layout>
