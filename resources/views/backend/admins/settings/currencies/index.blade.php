<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.currencies_list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.currencies') }}</div>
                </div>
            </div>

            <div class="section-body">
                @hasrole('admin')
                    <a class="btn btn-primary" href="{{ route('admins.currencies.create') }}">
                        {{ __('web.add_new') }}
                    </a>
                @endhasrole
                <h4 class="section-title">
                    <p class="section-lead">{{ __('web.system_currencies_management') }}</p>
                </h4>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                           @foreach ($currencies as $currency)
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h3>
                                                    <a class="font-weight-bold text-dark">{{ $currency->title }}</a>
                                                    @if ($currency->default)
                                                        <div class="bullet text-success"></div>
                                                        <a class="text-success">{{ __('web.default') }}</a>
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="article-user">
                                                <img alt="image" src="{{ asset('backend/img/money.png') }}">
                                                <div class="article-user-details">
                                                    <h5><span class="font-weight-bold text-dark">{{ __('web.symbol') }}: {{ $currency->symbol }}</span></h5>
                                                    <div class="user-detail-name" >
                                                        <i class="fas fa-check"></i> {{ __('web.active') }}:
                                                        <span class="font-weight-bold {{ $currency->active ? 'text-success ' : 'text-danger' }}">{{ $currency->active ? __('web.yes') : __('web.no') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="article-cta">
                                                @if (!$currency->default)
                                                    <a  href="{{ route('admins.currencies.edit', $currency->id) }}" class="btn btn-sm btn-info">
                                                        {{ __('web.edit') }} <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger"
                                                       data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_delete')}}?"
                                                       data-confirm-yes="event.preventDefault();
                                                    document.getElementById('destroy-{{ $currency->id }}').submit()"
                                                    >{{ __('web.delete') }} <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="destroy-{{ $currency->id }}" action="{{ route('admins.currencies.destroy', $currency->id) }}" method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @else
                                                    <a href="#"  class="btn btn-sm btn-secondary text-dark">
                                                        {{ __('web.you_cant_change_default_currency') }} <i class="fa fa-minus text-danger"></i>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-backend-layout>
