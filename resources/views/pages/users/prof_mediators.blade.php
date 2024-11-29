@extends('layouts.layout')
<x-seo.meta
    title="Профессиональные медиаторы"
    description="Профессиональные медиаторы"
    keywords="Профессиональные"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Профессиональные медиаторы')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Профессиональные медиаторы</h1>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.users.partial.left_menu', ['route' => 'prof_mediators'])

                </div>
                <div class="center_content">

                    <div class="m_option_m">
                        <div class="row_flex">
                            <div class="col_ava">

                                <div class="row_h_m">
                                    <a href="/reestr/professionalnye-mediatory/profmediator-page?user=7754">
                                        <div class="m_avamed"
                                             style="background-image: url('https://mediator.kz/components/com_mediatorreg/uploads/7754/1732270708-thumb.jpg')"></div>
                                    </a>
                                </div>


                            </div>
                            <div class="col_content">

                                <div class="row m__t1">

                                    <div class="col s6 m_tleft">
                                        <div class="mini_yellow_rating">
                                            <div class="yellow_rating"><span class="yellow_res_star"><img
                                                        src="/components/com_mediatorresponce/images/Star_grey20.svg"
                                                        alt="1"><img
                                                        src="/components/com_mediatorresponce/images/Star_grey20.svg"
                                                        alt="2"><img
                                                        src="/components/com_mediatorresponce/images/Star_grey20.svg"
                                                        alt="3"><img
                                                        src="/components/com_mediatorresponce/images/Star_grey20.svg"
                                                        alt="4"><img
                                                        src="/components/com_mediatorresponce/images/Star_grey20.svg"
                                                        alt="5"></span><span class="Newresult">0/0</span></div>
                                        </div>
                                    </div>

                                    <div class="col s6 m_tright">

                                        Количество проведенных медиаций: <span>
                                               0                                        </span>
                                    </div>

                                </div>
                                <div class="m__t2 m__t2_Flex">
                                    <div class="m2_tleft"><a
                                            href="/reestr/professionalnye-mediatory/profmediator-page?user=7754"><span>Садетов Кунунбай Николаевич</span></a>
                                    </div>
                                    <div class="m2_tright">Русский</div>
                                </div>
                                <div class="m__t3 ">
                                    <div class="m3_s">
                                        <span>№310 (Высшая Школа Медиации ОИПиЮЛ "Ассоциация Медиаторов Республики Казахстан)</span>
                                    </div>
                                </div>
                                <div class="m__t4 ">
                                    <div class="m4_s">
                                        <span>гражданские,семейные,трудовые,банковские споры и др.</span>
                                    </div>
                                </div>
                                <div class="m__t5 ">
                                    <div class="m5_s">
                                        <span>Виды медиации: </span>Уголовная, Гражданская, Ювенальная, Семейная,
                                        Корпоративная, Трудовые споры, Банковские споры
                                    </div>
                                </div>

                                <div class="m__t6 ">
                                    <div class="m6_s">
                                        <span><i>Город</i> Павлодар</span>, <span><i></i> Торайгырова</span>,
                                        <span><i>д</i> 105</span>, <span> · 87051293465</span> · <span
                                            class="blue_color">sadetov15061968@mail.ru</span></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </main>
@endsection



