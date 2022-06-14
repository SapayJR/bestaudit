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
                            <form action="{{ route('admins.companies.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Company title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="parent">User <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select name="user" class="form-control selectric" id="user" required>
                                            @foreach($userID as $user)
                                                <option  value="{{ $user['id'] }}">{{ $user['firstname'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Legal Name</label>
                                        <input type="text" name="legal_name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="Address" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>OKED</label>
                                        <input type="text" name="oked" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>CEO</label>
                                        <input type="text" name="ceo" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Bank Account</label>
                                        <input type="text" class="form-control purchase-code" name="bank_account"
                                               placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control invoice-input">
                                    </div>

                                    <div class="form-group">
                                        <label>TIN</label>
                                        <input type="text" name="tin" class="form-control invoice-input">
                                    </div>

                                    <div class="form-group">
                                        <label>MFO</label>
                                        <input type="text" name="mfo" class="form-control invoice-input">
                                    </div>

                                    <div class="card-footer text-left">
                                        <button type="submit" class="btn btn-primary">{{ __('web.save') }}</button>
                                    </div>
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
