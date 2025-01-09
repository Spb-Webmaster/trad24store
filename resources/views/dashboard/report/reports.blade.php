@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя | Отчеты  - {{ $user->user }} "
    description="Кабинет пользователя | Отчеты"
    keywords="Кабинет пользователя | Отчеты"
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



                            @include('dashboard.report._partial.yellow_buton')

                            <br>
                            <br>
                            @if($user->user_mediator_sum)
                                {{--Если есть отчеты--}}
                                <div class="cabinet_radius12_fff">
                                    <div class="c__title_subtitle pad_b13_important">
                                        <h3 class="F_h1">Сформировать отчет</h3>
                                        <div class="F_h2 pad_t5"><span>Выберите диапазон дат и получите отчет в excel файле </span>
                                        </div>
                                    </div>
                                    <div class="_r_range_flex _r_range">
                                        <div class="_r_range_left">
                                            <div class="_r_from">
                                                <div class="text_input">
                                                <x-forms.text-input_fromLabel
                                                    type="text"
                                                    id="from"
                                                    name="from"
                                                    placeholder="Выбрать дату (От ...)"
                                                    required="true"
                                                    class="input from"
                                                    value="{{ (old('from'))?:''  }}"
                                                    :isError="$errors->has('from')"
                                                />
                                                <x-forms.error class="error_from"/>
                                                </div>
                                            </div>
                                            <div class="_r_to">
                                                <div class="text_input">
                                                <x-forms.text-input_fromLabel
                                                    type="text"
                                                    id="to"
                                                    name="to"
                                                    placeholder="Выбрать дату (До ...)"
                                                    required="true"
                                                    class="input to"
                                                    value="{{ (old('to'))?:''  }}"
                                                    :isError="$errors->has('to')"
                                                />
                                                <x-forms.error class="error_to"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="_r_range_right">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="button_excel button_excel__js"><span>Скачать</span></div>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            @endif

                            <div class="cabinet_radius12_fff">


                                @if(count($user->user_mediator_nopublished))
                                    <div class="m_reports">
                                        @foreach($reports as $report)

                                            <div class="m_report">
                                                <div class="row row_h_report">
                                                    <div class="col s1 ">
                                                        <div class="row_h row_h_1_rep">
                                                            <div class="m_avareport"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col s3">
                                                        <div class="row_h row_h_2">

                                                            <div class="m_usernamebid">
                                                                {{ $user->user }}
                                                            </div><!--.m_usernamebid-->
                                                        </div><!--.row_h_report-->
                                                    </div>
                                                    <div class="col s2">
                                                        <div class="row_h row_h_3">
                                                            <div class="m_usernamebid">
                                                                {{ rusdate3($report->created_at) }}
                                                            </div><!--.m_usernamebid-->
                                                        </div><!--.row_h_3-->
                                                    </div>
                                                    <div class="col s4">


                                                        <x-dashboard.report.published
                                                            published="{{$report->published}}"
                                                            active="{{$report->active}}"
                                                        />


                                                    </div>
                                                    <div class="col s1">
                                                        <div class="report_Stroke report_Stroke__js">
                                                            <span class="smoke"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="report_full display_none">

                                                    <div class="report_flex">
                                                        <div class="report_flex__left desc">
                                                            {!! $report->desc !!}

                                                        </div>
                                                        <div class="report_flex__right">
                                                            <div class="option__report ">

                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Семейная</div>
                                                                    <div class="rep_option_int">{{ $report->sem }}</div>
                                                                </div>


                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Уголовная</div>
                                                                    <div class="rep_option_int">{{ $report->ugo }}</div>
                                                                </div>

                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Гражданская</div>
                                                                    <div class="rep_option_int">{{ $report->gra }}</div>
                                                                </div>

                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Ювенальная</div>
                                                                    <div class="rep_option_int">{{ $report->uve }}</div>
                                                                </div>

                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Корпоративная</div>
                                                                    <div class="rep_option_int">{{ $report->kor }}</div>
                                                                </div>

                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Трудовые споры</div>
                                                                    <div class="rep_option_int">{{ $report->tru }}</div>
                                                                </div>


                                                                <div class="rep_option_med">
                                                                    <div class="rep_option">Банковские споры</div>
                                                                    <div class="rep_option_int">{{ $report->ban }}</div>
                                                                </div>


                                                                @if(!$report->active)
                                                                    <div class="no_publish">
                                                                    <a href="{{ route('reports.update', ['id'=> $report->id]) }}" class="no_publish_button">Переделать</a>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div><!--.m_report-->

                                        @endforeach
                                        {{ $reports->withQueryString()->links('pagination::default') }}

                                    </div>

                                @else

                                    <div class="c__title_subtitle">
                                        <h3 class="F_h1">Отчеты</h3>
                                        <div class="F_h2 pad_t5"><span>Нет отправленных отчетов</span></div>
                                    </div>
                                @endif


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection


