@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Список медиаторов"
    description="Список медиаторов"
    keywords="Список медиаторов"
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
                                    <h3 class="F_h1">{{ __('Медиаторы') }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{__('Персональные данные медиаторов')}}</span></div>
                                </div>

                                <div class="dashboardBox">
                                    @if(count($items))
                                        <div class="dashboardBox__title">
                                            <div class="a_user__row a_user">
                                                <div class="a_user__check a_user__checkbox_all" style="min-width: 41px">
                                                    <div class="user_mediator_avatar user_mediator_avatar_tea"
                                                        style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K  ');"></div>
                                                </div>
                                                <div class="a_user__name">
                                                    ФИО, возраст
                                                </div>
                                                <div class="a_user__email">
                                                    E-mail, телефон
                                                </div>

                                                <div class="a_user__personal_nolink">
                                                    Тип профиля
                                                </div>
                                            </div>

                                        </div>

                                        @include('dashboard.manager.forms.search_users')

                                        <div class="dashboardBox__a_users a_users pad_b26">

                                            @foreach($items as $k=>$item)

                                                <div
                                                    class="a_user__row a_user
                                                       @if(count($item->user_mediator_nopublished))
                                                       background_biruza
                                                      @endif
                                                        @if(!$item->published) background_alert @endif

                                                    ">
                                                    <div class="a_user__checkbox">

                                                        <div class="user_mediator_avatar"    @if($item->avatar) style="background-image: url('{{ Storage::url($item->avatar) }}')" @else
                                                            style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K  ');"
                                                            @endif></div>

                                                    </div>
                                                    <div class="a_user__name">
                                                        <div class="a_user__nameFio">
                                                            <div class="a_user__left">
                                                                {{$item->user}}
                                                            </div>
                                                            <div class="a_user__right LC_icons">
                                                                @if(count($item->user_mediator))
                                                                    <span class="LC_senior_cash"
                                                                          title="Отчеты">{{ count($item->user_mediator) }}</span>
                                                                @endif
                                                                @if($item->stars)
                                                                    <span
                                                                        class="LC_senior_ball"
                                                                        title="Звезды">{{ $item->stars}}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="a_user__nameBirthdate color_grey color_grey_12">
                                                            {{ ((isset($item->birthday))?rusdate3($item->birthday):'') }}
                                                        </div>

                                                    </div>
                                                    <div class="a_user__email">
                                                        <div class="a_user__nameFio">
                                                            @if($item->email)
                                                                {{ $item->email }}
                                                            @endif
                                                        </div>
                                                        <div class="a_user__nameBirthdate color_grey color_grey_12">
                                                            @if($item->phone)
                                                                <a href="tel:{{$item->phone}}">{{ ((isset($item->phone))?format_phone($item->phone):'') }}</a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('m_user', ['id' => $item->id]) }}"
                                                       class="a_user__personal">
                                                        @if($item->manager)
                                                            Manager
                                                        @else
                                                            User
                                                        @endif
                                                        <span><img src="https://hottour.kz/images/arrow/next.svg"
                                                                   alt="next"></span>
                                                    </a>
                                                    <div class="a_user__delete">
                                                        <div class="blockForm">
                                                            <form class="form"
                                                                  action=""
                                                                  method="GET"
                                                                  onsubmit="alert('Удаление возможно только с правами администратора'); return false">
                                                                <input type="submit" class="delete_user" value="x">

                                                            </form>
                                                        </div><!--.blockForm-->
                                                    </div>

                                                </div>

                                            @endforeach
                                        </div>

                                        {{ $items->withQueryString()->links('pagination::default') }}

                                    @endif


                                </div><!--.dashboardBox-->
                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection


