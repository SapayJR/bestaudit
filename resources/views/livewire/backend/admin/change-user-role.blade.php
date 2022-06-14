<div class="table-responsive">
    <form  wire:submit.prevent="changeRole" >
        <table class="table table-striped">
            <tbody>
            <tr>
                <th class="text-center">
                    <div class="custom-checkbox custom-control">
                        <i class="fas fa-check"></i>
                    </div>
                </th>
                <th>{{ __('web.title') }}</th>
                <th>{{ __('web.guard') }}</th>
            </tr>
                @forelse($roles as $role)
                        <tr>
                            <td class="text-center">
                                <div class="custom-radio custom-control">
                                    <input type="radio" wire:model="userRole" value="{{ $role->name }}" class="custom-control-input" id="{{  $role->name }}" @if($role->name == 'moderator') disabled @endif>
                                    <label for="{{  $role->name }}" class="custom-control-label">&nbsp</label>
                                </div>
                            </td>
                            <td>{{ __('web.'.$role->name) }} @if($role->name == 'moderator') <span class="text-info">({{ __('web.for_seller_only') }})</span> @endif</td>
                            <td>{{ $role->guard_name }}</td>
                        </tr>
                @empty
                @endforelse

            </tbody>
        </table>
        <div class="card-footer">
            <div class="float-md-left">
                <button type="submit" wire:target="changeRole" wire:loading.class="disabled btn-progress" class="btn btn-lg btn-primary">{{ __('web.save') }}</button>
            </div>
        </div>
    </form>
</div>

