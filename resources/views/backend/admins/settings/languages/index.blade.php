<x-backend-layout>
    <div class="main-content" style="min-height: 864px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('web.languages_list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('web.dashboard') }}</a></div>
                    <div class="breadcrumb-item active">{{ __('web.languages') }}</div>
                </div>
            </div>

            <div class="section-body">
                @hasrole('admin')
                    <a class="btn btn-primary" href="{{ route('admins.languages.create') }}">
                        {{ __('web.add_new') }}
                    </a>
                @endhasrole
                <h4 class="section-title">
                    <p class="section-lead">{{ __('web.system_languages_management') }}</p>
                </h4>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                           @foreach ($languages as $language)
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h3>
                                                    <a class="font-weight-bold text-dark">{{ $language->title }}</a>
                                                    @if ($language->default)
                                                        <div class="bullet text-success"></div>
                                                        <a class="text-success">{{ __('web.default') }}</a>
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="article-user">
                                                    @if ($language->img)
                                                        <img alt="image" src="{{ asset('/storage/images/languages/' . $language->img) }}" width="45" height="48">
                                                    @else
                                                        <img alt="image" src="{{ asset('backend/img/translate.png') }}">
                                                    @endif
                                                <div class="article-user-details">
                                                    <h3>
                                                        <span class="font-weight-bold text-dark">{{ $language->locale }}</span>
                                                    </h3>
                                                    <div class="user-detail-name">
                                                        <i class="fas fa-check"></i> {{ __('web.active') }}:
                                                        <span class=" font-weight-bold {{ $language->active ? 'text-success ' : 'text-danger' }}">{{ $language->active ? __('web.yes') : __('web.no') }}</span>
                                                        <br/>
                                                        <i class="fas fa-arrow-left"></i> {{ __('web.backward') }}:
                                                        <span class=" font-weight-bold {{ $language->backward ? 'text-success ' : 'text-danger' }}">{{ $language->backward ? __('web.yes') : __('web.no') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="article-cta">
                                                @if (!$language->default)
                                                    <a href="#" class="btn btn-sm btn-success"
                                                       data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_set_default')}}?"
                                                       data-confirm-yes="event.preventDefault();
                                                    document.getElementById('default-{{ $language->id }}').submit()"
                                                    >
                                                        {{ __('web.make_it_default') }} <i class="fas fa-check"></i>
                                                    </a>
                                                    <form id="default-{{ $language->id }}" action="{{ route('admins.languages.default', $language->id) }}" method="post" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif
                                                <a  href="{{ route('admins.languages.edit', $language->id) }}" class="btn btn-sm btn-info">
                                                    {{ __('web.edit') }} <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger"
                                                   data-confirm="{{ __('web.action_confirmation') }}|{{__('web.do_you_really_want_to_delete')}}?"
                                                   data-confirm-yes="event.preventDefault();
                                                    document.getElementById('destroy-{{ $language->id }}').submit()"
                                                >
                                                    <form id="destroy-{{ $language->id }}" action="{{ route('admins.languages.destroy', $language->id) }}" method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    {{ __('web.delete') }} <i class="fas fa-trash"></i>
                                                </a>
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
