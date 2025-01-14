@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Отзыв для модерации для медиатора: {{$user->user}}"
    description="Отзыв для модерации"
    keywords="Отзыв для модерации"
/>
@section('cabinet')
    <main class="m_cabinet">

        <div class="auth">
            <div class="cabinet">
                <div class="block">

                    @include('dashboard._partial.top')

                    <div class="cabinet__flex  height_100">
                        <div class="cabinet__left">
                            <div class="cl">

                                @include('dashboard.left_bar.left')

                            </div>
                        </div>
                        <div class="cabinet__right">
                            @include('dashboard.menu.cabinet_menu')

                            <div class="cabinet_radius12_fff">

                                <div class="c__title_subtitle">
                                    <h3 class="F_h1">{{ __('Медиатор') }} / <span
                                            class="blue">{{ $item->user->user }}</span>
                                    </h3>
                                    <div class="F_h2 pad_t5"><span>{{__('Данные отзыва')}}</span></div>
                                </div>


                                <div class="dashboardBox">

                                    <div class="c__block">
                                        <div class="com_responce">

                                            @if($item)

                                                <div class="com_responce_tr">

                                                    <div class="com_responce__flex">
                                                        <div class="com_responce__left">
                                                            <div class="com_responce__name" title="{{ $item->title }}">{{ $item->title }}</div>
                                                            <div
                                                                class="com_responce__stars">@include('pages.users.partial.stars', ['star'=> $item->stars])</div>
                                                            <div class="com_responce__phone" title="{{ $item->phone }}">{{ $item->phone }}</div>
                                                            <div class="com_responce__email" title="{{ $item->email }}">{{ $item->email }}</div>


                                                        </div>
                                                        <div class="com_responce__right">
                                                            {!! $item->desc !!}

                                                        </div>
                                                    </div>


                                                    <div class="mediator_flex_0_wrap pad_t31">


                                                        <div class="mediator_flex_0">

                                                            <div class="mediator_left__flex_0">
                                                                <x-forms.auth-form
                                                                    action="{{ route('delete_comment') }}"
                                                                    method="POST"
                                                                >


                                                                    <div class=" text_input">
                                                                        <input type="hidden" value="{{ $item->id  }}" name="id">
                                                                        <x-forms.button class="blocked active">
                                                                            {{ __('Удалить') }}
                                                                        </x-forms.button>
                                                                    </div>
                                                                </x-forms.auth-form>


                                                            </div>

                                                            <div class="mediator_right__flex_0">
                                                                <x-forms.auth-form

                                                                    action="{{ route('published_comments') }}"
                                                                    method="POST"
                                                                >

                                                                    <div class=" text_input">
                                                                        <input type="hidden" value="{{ $item->id  }}" name="id">
                                                                        <x-forms.button class="unblock active">
                                                                            {{ __('Одобрить') }}
                                                                        </x-forms.button>
                                                                    </div>
                                                                </x-forms.auth-form>
                                                            </div>


                                                        </div>

                                                    </div>


                                                </div><!--.com_responce_tr-->

                                            @endif

                                        </div><!--.com_responce-->
                                    </div>


                                </div><!--.dashboardBox-->


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection





