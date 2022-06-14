<x-backend-layout>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('backend/js/modules/datatables/css/dataTables.bootstrap4.min.css') }}">
    </x-slot>

    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.invitations') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.invitations') }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ __('web.invitation_description') }}</h2>

                <div class="form-group">
                    <div class="input-group">
                        <b class="mr-2 mt-2">{{ __('web.your_personal_shop_link_for_invite_users') }}: </b>
                        <input id="copy_{{ $shop->id }}" type="text" class="form-control col-md-6" value="{{ request()->getHttpHost() . "/shops/$shop->uuid/invitations/$shop->id" }}" readonly style="border: none">
                        <div class="input-group-append">
                            <button class="btn btn-primary" value="copy" onclick="copyToClipboard('copy_{{ $shop->id }}')" type="button">Copy!</button>
                        </div>
                        <div class="ml-4 mt-2 text-success font-weight-bold" id="copied" style="display: none">{{ __('web.copied_to_clipboard!') }}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('web.invitations_list') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                {{ '#' }}
                                            </th>
                                            <th>{{ __('web.user') }}</th>
                                            <th>{{ __('web.gender') }}</th>
                                            <th>{{ __('web.role') }}</th>
                                            <th>{{ __('web.status') }}</th>
                                            <th>{{ __('web.registered_date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($invitations as $invite)
                                        <tr>
                                            <td>
                                                {{ $invite->id }}
                                            </td>
                                            <td>
                                                <img alt="image" src="{{ asset('backend/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                                {{ $invite->user->firstname . ' ' . $invite->user->lastname }}
                                            </td>
                                            <td> {{  __('web.' . $invite->user->gender) }}</td>
                                            <td> {{  __('web.' . $invite->user->role) }}</td>

                                            <td>
                                                <div class="badge
                                                    @switch($invite->status->value)
                                                        @case('new') badge-primary @break
                                                        @case('viewed') badge-info @break
                                                        @case('excepted') badge-success @break
                                                            badge-danger
                                                        @default
                                                    @endswitch">
                                                    {{ __('web.'.$invite->status->value) }}
                                                </div>
                                            </td>
                                            <td>{{ $invite->created_at->format('d/m/Y H:i:s') }}</td>

                                        </tr>
                                        @empty
                                        @endforelse
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
<x-slot name="css">
    <script>
        function copyToClipboard(id) {
            let text = document.getElementById(id).select();
            document.execCommand('copy');

            document.getElementById('copied').style.display = "block"
            setTimeout( function () {
                document.getElementById('copied').style.display = "none"
            }, 3000);
        }
    </script>
</x-slot>
</x-backend-layout>
