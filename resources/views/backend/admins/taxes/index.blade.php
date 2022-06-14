<x-backend-layout>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/datatables/css/dataTables.bootstrap4.min.css') }}">
    </x-slot>

    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.taxes_list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.categories') }}</div>
                </div>
            </div>

            <div class="section-body">
                @hasrole('admin')
                <a class="btn btn-primary" href="{{ route('admins.taxes.create') }}">
                    {{ __('web.add_new') }}
                </a>
                @endhasrole
                <h4 class="section-title">
                    <p class="section-lead">{{ __('web.system_taxes_management') }}</p>
                </h4>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.taxes_list') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>{{ __('web.title') }}</th>
                                            <th>Tax percent</th>
                                            {{-- <th>{{ __('web.img') }}</th> --}}
                                            <th>{{ __('web.status') }}</th>
                                            <th>{{ __('web.options') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($taxes as $tax)
                                            <tr>
                                                <td class="text-center">
                                                 {{ $tax->id }}
                                                </td>
                                                <td>
                                                    {{ $tax->translation->title ?? '' }}
                                                </td>
                                                <td class="align-middle ">
                                                    {{ $tax->tax_rate }}
                                                </td>
                                                {{--
                                                    <td>
                                                        @if ($category->img)
                                                            <img alt="image" src="{{ asset('storage/images/categories/' . $category->img) }}" class="rounded-circle" width="50" data-toggle="tooltip" title="img">
                                                        @else
                                                            <img alt="image" src="{{ asset('backend/img/icon.png') }}" class="rounded-circle" width="50" data-toggle="tooltip" >
                                                        @endif
                                                    </td>
                                                --}}
                                                <td>
                                                    <div class="badge badge-">

                                                    </div>
                                                </td>
                                                <td  class="text-center">
                                                    <a href="" class="btn btn-info"><i class="fas fa-edit"></i></a>

                                                    <a href="#" class="btn btn-danger   "
                                                       data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_delete')}}?"
                                                       data-confirm-yes="event.preventDefault();
                                                    document.getElementById('destroy-').submit()">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="" action="" method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-slot name="javascript">
        <script src="{{ asset('backend/js/modules/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('backend/js/modules/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/js/page/modules-datatables.js') }}"></script>
    </x-slot>
</x-backend-layout>
