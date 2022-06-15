<x-backend-layout>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/select/css/select.bootstrap4.min.css') }}">
        <link rel="stylesheet"
              href="{{ asset('backend/js/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/jquery-selectric/selectric.css') }}">
    </x-slot>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.category') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item"><a href="">{{ __('web.categories') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.category') }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ __('web.adding_new') . ' ' . strtolower(__('web.category')) }}</h2>
                <p class="section-lead">{{ __('web.adding_form_note') }}</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4>Add Company</h4>
                            </div>

                            <form action="{{ route('admins.companies.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="card-header">
                                                <label for="parent">User <span
                                                        class="text-danger font-weight-bold">*</span></label>
                                            </div>
                                            <div class="card-body">
                                                <select name="user" class="form-control selectric" id="user" required>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="card-header">
                                                <label for="parent">Auditor <span
                                                        class="text-danger font-weight-bold">*</span></label>
                                            </div>
                                            <div class="card-body">
                                                <select name="auditor_id" class="form-control selectric" id="user"
                                                        required>
                                                    @foreach($users->where('role','auditor') as $user)
                                                        <option value="{{ $user->id }}">{{ $user->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="card-header">
                                                <label>Company title</label>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>

                                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="card-header">
                                                <label>Legal Name</label>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" name="legal_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="card-body col-12 col-md-4 col-lg-4">
                                            <label>Address</label>
                                            <input type="text" name="Address" class="form-control">
                                        </div>


                                        <div class="card-body col-12 col-md-4 col-lg-4">
                                            <label>OKED</label>
                                            <input type="text" name="oked" class="form-control">
                                        </div>

                                        <div class="card-body col-12 col-md-4 col-lg-4">
                                            <label>CEO</label>
                                            <input type="text" name="ceo" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="card-body col-12 col-md-3 col-lg-3">
                                            <label>Bank Account</label>
                                            <input type="text" class="form-control purchase-code"
                                                   name="bank_account"
                                                   placeholder="">
                                        </div>

                                        <div class="card-body col-12 col-md-3 col-lg-3">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control invoice-input">
                                        </div>

                                        <div class="card-body col-12 col-md-3 col-lg-3">
                                            <label>TIN</label>
                                            <input type="text" name="tin" class="form-control invoice-input">
                                        </div>

                                        <div class="card-body col-12 col-md-3 col-lg-3">
                                            <label>MFO</label>
                                            <input type="text" name="mfo" class="form-control invoice-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="d-block">Taxes</label>
                                        @foreach($taxes as $tax)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="taxes[]"
                                                       value="{{$tax->id}}" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    {{ $tax->translation->title ?? ''  }} {{ $tax->tax_rate }} %
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="card-footer text-left">
                                    <button type="submit"
                                            class="btn btn-primary">{{ __('web.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <x-slot name="javascript">
        <script src="{{ asset('backend/js/modules/upload-preview/jquery.uploadPreview.min.js') }}"></script>
        <script src="{{ asset('backend/js/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('backend/js/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('backend/js/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('backend/js/page/features-post-create.js') }}"></script>
        <script>
            $("select").selectric();
            $(".inputtags").tagsinput('items');
        </script>
    </x-slot>
</x-backend-layout>
