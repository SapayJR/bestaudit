<div class="card">
    <div class="card-header">
        <h4>
            <input class="form-control" type="text"  wire:model.debounce.1000ms="length" placeholder="{{ __('web.length') }}">
        </h4>
        <div class="input-group">
            <input class="form-control" type="search" wire:model="search"  placeholder="{{ __('web.search') }}">
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th wire:click.prevent="sortBy('id')">{{ '#' }}</th>
                <th wire:click.prevent="sortBy('firstname')">{{ __('web.full_name') }}</th>
                <th wire:click.prevent="sortBy('email')">{{ __('web.email') }}</th>
                <th>{{ __('web.phone') }}</th>
                <th>{{ __('web.role') }}</th>
                <th wire:click.prevent="sortBy('birthday')">{{ __('web.birthday') }}</th>
                <th>{{ __('web.active') }}</th>
                <th>{{ __('web.options') }}</th>
            </tr>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname.' '.$user->lastname }} <h5 class="{{ $user->isOnline() ? 'bullet text-success' : ''}}"></h5> </td>
                <td>
                    {{  $user->email ?? __('web.not_specified') }}
                </td>
                <td>
                    {{ $user->phone }}
                </td>
                <td>
                    <span class="badge badge-dark">{{ $user->role }}</span>
                </td>
                <td>{{ optional($user->birthday)->format('d/m/Y') ?? __('web.not_specified') }}</td>
                <td><div class="badge {{ $user->active ? 'badge-success' : 'badge-danger' }}">{{ $user->active() }}</div></td>
                <td><a href="{{ route('admins.users.profile.personal', $user->uuid) }}" class="btn btn-secondary">{{ __('web.details') }}</a></td>
            </tr>
            @empty
            @endforelse

            </tbody>
        </table>
    </div>
    </div>
    <div class="card-footer">
        <div class="dataTables_info" id="editable-datatable_info" role="status" aria-live="polite">
            {{ __('web.showing') }}
            {{ $users->count() > 0 ? '1' : 0  }} to {{ $users->count() }} of {{ $count }} entries
        </div>
    </div>
</div>

