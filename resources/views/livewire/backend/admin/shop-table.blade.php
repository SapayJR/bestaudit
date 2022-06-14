<div>
    <!-- Filter Raw -->
    <div class="row">
        <div class="col-12 col-md- col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" wire:click="setFilter" data-toggle="collapse" href="#filters" role="button" aria-expanded="true" aria-controls="filters">
                        {{ __('web.filter') }}
                    </a>
                    <a class="btn btn-success"  href="#" role="button">
                        <i class="fas fa-file-export"></i> {{ __('web.export') }}
                    </a>
                    <div class="collapse @if($filter) show @endif " id="filters" style="">
                        <div class="card-header">
                            <div class="row col-12">
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('web.length') }}</label>
                                        <select wire:model="length" class="form-control">
                                            <option>{{ '20' }}</option>
                                            <option>{{ '50' }}</option>
                                            <option>{{ '100' }}</option>
                                            <option>{{ '150' }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('web.order_by') }}</label>
                                        <select  wire:model="sort" class="form-control">
                                            <option value="desc">{{ __('web.desc') }}</option>
                                            <option value="asc">{{ __('web.asc') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('web.column') }}</label>
                                        <select  wire:model="column" class="form-control">
                                            <option value="updated_at">{{ __('web.updated_date') }}</option>
                                            <option value="percentage">{{ __('web.percentage') }}</option>
                                            <option value="active">{{ __('web.active') }}</option>
                                            @if ($this->status == 'all')
                                                <option value="status">{{ __('web.status') }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('web.status') }}</label>
                                        <select  wire:model="status" class="form-control">
                                            <option value="all">{{ __('web.all') }}</option>
                                            <option value="created">{{ __('web.created') }}</option>
                                            <option value="edited">{{ __('web.edited') }}</option>
                                            <option value="approved">{{ __('web.approved') }}</option>
                                            <option value="rejected">{{ __('web.rejected') }}</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Raw -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $shops->count() > 0 ? '1' : 0  }} {{ __('web.to') }} {{ $shops->count() }} {{ __('web.of') }} {{ $count }} {{ strtolower(__('web.entries')) }}
                        </h4>
                        <div class="input-group float-md-right col-lg-10 col-md-10 col-sm-12">
                            <input type="search" wire:model="search" class="form-control" placeholder="{{ __('web.search') }}">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr class="text-center" style="cursor: pointer">
                                    <th wire:click.prevent="sortBy('id')">#</th>
                                    <th>{{ __('web.title') }}</th>
                                    <th>{{ __('web.seller') }}</th>
                                    <th wire:click.prevent="sortBy('percentage')">{{ __('web.percentage') }}</th>
                                    <th wire:click.prevent="sortBy('active')">{{ __('web.active') }}</th>
                                    <th wire:click.prevent="sortBy('open')">{{ __('web.working_status') }}</th>
                                    <th wire:click.prevent="sortBy('status')">{{ __('web.status') }}</th>
                                    <th wire:click.prevent="sortBy('updated_at')">{{ __('web.updated_date') }}</th>
                                    <th>{{ __('web.options') }}</th>
                                </tr>
                                @forelse($shops as $shop)
                                    <tr>
                                        <td class="text-center">{{ $shop->id }}</td>
                                        <td>{{ $shop->translation->title }}</td>
                                        <td>
                                            <img alt="image" src="{{ $shop->seller->profile_photo_url }}" class="rounded-circle" width="35"
                                                 data-toggle="tooltip" title="" data-original-title="{{ $shop->seller->firstname . ' ' . $shop->seller->lastname }}">
                                            <a href="{{ route('admins.users.profile.personal',  $shop->seller->uuid)  }}" class="font-weight-bold text-decoration-none">{{ $shop->seller->firstname . ' ' . $shop->seller->lastname }}</a>
                                        </td>

                                        <td class="text-center">{{ $shop->percentage }} %</td>
                                        <td class="text-center">
                                            <div class="badge {{ $shop->active ? 'badge-success' : 'badge-danger' }}">
                                                @if($shop->active) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge {{ $shop->working_status ? 'badge-success' : 'badge-danger' }}">
                                                {{ $shop->working_status ?__('web.open') : __('web.closed') }}
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="badge @switch($shop->status->value)
                                            @case(\App\Enums\ShopStatus::Created->value)
                                                badge-primary
                                                @break
                                            @case(\App\Enums\ShopStatus::Edited->value)
                                                badge-info
                                                @break
                                            @case(\App\Enums\ShopStatus::Approved->value)
                                                badge-success
                                                @break
                                            @default
                                                badge-danger
                                            @endswitch">{{ __('web.' . $shop->status->value) }}</div>
                                        </td>
                                        <td class="text-center">{{ $shop->updated_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admins.shops.show', $shop->uuid) }}" class="btn btn-secondary" rel="{{ __('web.show') }}"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
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
</div>
