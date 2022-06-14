<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="search">{{ __('web.search') }}</label>
                    <input type="search" wire:model="search" placeholder="{{ __('web.search_by') . ' ' . strtolower(__('web.title')) . ' & ' . strtolower(__('web.id'))  }}" class="form-control" id="search">
                </div>
            </div>
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
                    <select  wire:model="tag" class="form-control">
                        <option value="id">{{ __('web.id') }}</option>
                        <option value="title">{{ __('web.title') }}</option>
                        <option value="active">{{ __('web.active') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>{{ __('web.showing') }}</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            {{ $brands->count() > 0 ? '1' : 0  }} {{ __('web.to') }} {{ $brands->count() }} {{ __('web.of') }} {{ $count }} {{ strtolower(__('web.entries')) }}
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row col-12">
            @forelse($brands as $brand)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            @if ($brand->img)
                                <div class="article-image" data-background="{{ asset('storage/images/brands/' . $brand->img) }}" style="background-image: url({{ asset('storage/images/brands/' . $brand->img)  }});">
                                </div>
                            @else
                                <div class="article-image" data-background="{{ asset('backend/img/news/img08.jpg') }}" style="background-image: url({{ asset('backend/img/news/img08.jpg') }});">
                                </div>
                            @endif

                            <div class="article-title">
                                <h2><a href="#">{{ $brand->title }}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{{ __('web.active') }}:
                                <span class=" font-weight-bold {{ $brand->active ? 'text-success ' : 'text-danger' }}">{{ $brand->active ? __('web.yes') : __('web.no') }}</span>
                            </p>
                            <p>{{ __('web.category') }}: <span class="font-weight-bold">{{ $brand->category->translation->title ?? '' }}</span> </p>
                            <div class="article-cta">
                                <a href="{{ route('admins.brands.edit', $brand->id) }}" class="btn btn-sm btn-info right"><i class="fas fa-edit"></i> {{ __('web.edit') }}</a>
                                <a href="#" class="btn btn-sm btn-danger"
                                   data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_delete')}}?"
                                   data-confirm-yes="event.preventDefault();
                                                    document.getElementById('destroy-{{ $brand->id }}').submit()">
                                    <i class="fas fa-trash"></i> {{ __('web.delete') }}</a>

                                <form id="destroy-{{ $brand->id }}" action="{{ route('admins.brands.destroy', $brand->id) }}" method="post" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <h3 >{{ __('web.nothing_found') }}</h3>
            @endforelse
        </div>
    </div>
</div>
