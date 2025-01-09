@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Отчет для модерации менеджером: {{$user->user}}"
    description="Отчет для модерации"
    keywords="Отчет для модерации"
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
                                    <h3 class="F_h1">{{ __('Медиатор') }} / <span class="blue">{{ $item->user->user }}</span>
                                        @if(!$item->user->published) / <span class="color_red">Заблокирован!</span>

                                        @endif
                                    </h3>
                                    <div class="F_h2 pad_t5"><span>{{__('Данные отчета')}}</span></div>
                                </div>



                                <div class="dashboardBox">

                                    <div class="c__block">

                                        <div class="c__flex">

                                            <div class="c__flex_50 c__flex_50_left">


                                                <div class="text_input pad_t6_important">
                                                    <span class="blue_label">Периуд медиации</span>

                                                    <div class="_month pad_t9">{{ rusdate_month($item->created_at) }}</div>



                                                </div>


                                                <hr>



                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Семейная медиация - <b>{{ $item->sem }}</b></div>
                                                </div>


                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Уголовная медиация - <b>{{ $item->ugo }}</b></div>
                                                </div>


                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Гражданская медиация - <b>{{ $item->gra }}</b></div>
                                                </div>

                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Ювенальная медиация - <b>{{ $item->uve }}</b></div>


                                                </div>

                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Корпоративная медиация - <b>{{ $item->kor }}</b></div>


                                                </div>

                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Трудовые споры - <b>{{ $item->tru }}</b></div>

                                                </div>

                                                <div class="text_input">
                                                    <span class="blue_label">Количество проведенных медиаций</span>
                                                    <div class="man_report">Банковские споры - <b>{{ $item->ban }}</b></div>

                                                </div>



                                            </div><!--.c__flex_50_left-->

                                            <div class="c__flex_50 c__flex_50_right">

                                                <div class="text_input">
                                                    <div class="medi_summ">


                                                            <div class="em_18">Общее количество проведенных медиаций <br><br><span
                                                                    class="b_36">{{ $item->user->periud_report($item->id) }}</span></div>

                                                    </div>

                                                </div>


                                            </div><!--.c__flex_50_right-->

                                        </div><!--.c__flex-->

                                        @if($item->active)

                                        <div class="mediator_flex_0_wrap pad_t31">


                                            <div class="mediator_flex_0">

                                                <div class="mediator_left__flex_0">
                                                    <x-forms.auth-form
                                                        action="{{ route('blocked_report') }}"
                                                        method="POST"
                                                    >

                                                        <div class="text_input textarea_input">
                                                            <x-forms.textarea
                                                                type="textarea"
                                                                name="desc"
                                                                placeholder="Написать пару слов..."
                                                                value=""
                                                                class="input desc"
                                                            />
                                                            <x-forms.error class="error_desc"/>

                                                        </div>

                                                        <div class=" text_input">
                                                            <input type="hidden" value="{{ $item->id  }}" name="id">
                                                            <x-forms.button class="blocked active">
                                                                {{ __('Отклонить') }}
                                                            </x-forms.button>
                                                        </div>
                                                    </x-forms.auth-form>


                                                </div>

                                                    <div class="mediator_right__flex_0">
                                                        <x-forms.auth-form

                                                            action="{{ route('unblock_report') }}"
                                                            method="POST"
                                                        >

                                                            <div class="text_input textarea_input">
                                                                <x-forms.textarea
                                                                    type="textarea"
                                                                    name="desc"
                                                                    placeholder="Написать пару слов..."
                                                                    value=""
                                                                    class="input desc"
                                                                />
                                                                <x-forms.error class="error_desc"/>

                                                            </div>

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

                                        @else
                                            <br>
                                            <br>
                                            <div class="suret_text desc pad_t18_important  pad_b18_important  ">
                                                <h3>Отчет отклонен</h3>
                                                @if($item->desc)
                                                    <span>Медиатору направлено следующее сообщение:</span>
                                                    <div class="text_act">
                                                        {!! $item->desc !!}
                                                    </div>
                                                @endif
                                            </div>

                                        @endif


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




