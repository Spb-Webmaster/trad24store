<div class="mob_menu_content">

    <div class="mob_menu_content_absol">
        <div class="m_m_cont_top m_m_cont_top1">
            <span class="m_m_top_label">{{ __('Меню') }}</span>
            <span class="m_m_top_close"></span>
        </div>
        <div class="m_m_cont_top m_m_cont_top2">
        <span class="m_m_top_lang">
            @include('include.translate.translate')
        </span><!--.m_m_top_lang-->
        </div>
        <div class="fMenu tab_plane" data-mf="m_f3"></div>

        <div class="fContacts tab_plane" data-mf="m_f4">
            <div class="contact_mobilie">
                @include('include.connect._change_contacts')
            </div>
        </div>


        <div class="fLogin tab_plane" data-mf="m_f5">
            @auth()
                @php
                    $user = auth()->user();
                @endphp
                @include('dashboard.left_bar._partial.avatar', ['user' => $user])
                <div class="c__title_subtitle">

                        <ul class="mob_cab_menu mob_cab_menu__js">
                            <li class="v_s_c__item {{ active_linkMenu(asset(route('cabinet')), 'find')  }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></li>
                            <li class="v_s_c__item {{ active_linkMenu(asset(route('reports')), 'find')  }}"><a href="{{ route('reports') }}">{{ __('Отчеты') }}</a></li>

                            <li class="v_s_c__item {{ active_linkMenu(asset(route('comments')), 'find')  }}"><a href="{{ route('comments') }}">{{ __('Отзывы') }}</a></li>

                            @if($user->status_pay_subscr() == 1)  {{--оплачено--}}
                            <li class="v_s_c__item {{ active_linkMenu(asset(route('m_user_news')), 'find')  }}"><a href="{{ route('m_user_news') }}">{{ __('Новости') }}</a></li>

                            <li class="v_s_c__item {{ active_linkMenu(asset(route('m_user_ads')), 'find')  }}"><a href="{{ route('m_user_ads') }}">{{ __('Объявления') }}</a></li>

                            <li class="v_s_c__item {{ active_linkMenu(asset(route('m_user_laws')), 'find')  }}"><a href="{{ route('m_user_laws') }}">{{ __('Законы') }}</a></li>

                            <li class="v_s_c__item {{ active_linkMenu(asset(route('m_user_docs')), 'find')  }}"><a href="{{ route('m_user_docs') }}">{{ __('Документы') }}</a></li>
                            @endif

                            @if($user->manager)

                                <li><span class="man">Меню менеджера</span></li>
                                <li class="v_s_c__item {{ active_linkMenu(asset(route('m_users')), 'find')  }}"><a href="{{ route('m_users') }}">{{ __('Медиаторы') }}
                                        @if($users_no_publiched)
                                            <span class="_int">{{ $users_no_publiched }}</span>
                                        @endif
                                    </a></li>
                                <li class="v_s_c__item {{ active_linkMenu(asset(route('m_reports')), 'find')  }}"><a href="{{ route('m_reports') }}">{{ __('Отчеты') }}
                                        @if($report_no_publiched)
                                            <span class="_int">{{ $report_no_publiched }}</span>
                                        @endif
                                    </a></li>
                                <li class="v_s_c__item {{ active_linkMenu(asset(route('m_comments')), 'find')  }}"><a href="{{ route('m_comments') }}">{{ __('Отзывы') }}
                                        @if($comment_no_publiched)
                                            <span class="_int">{{ $comment_no_publiched }}</span>
                                        @endif
                                    </a></li>
                            @endif


                            <li>
                                <x-forms.auth-form_mob2
                                    action="{{ route('logout') }}"
                                    method="POST">
                                    <button type="submit" class="enter_to_website__a2 enter_to_website__a2__mob">
                                    <span
                                        class="sp__kab">
                                        {{__('Выход')}}
                                        <img alt=""
                                             src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE0LjUzNjEgMi42MTU3MkgxOC41MzYxQzE5LjA2NjYgMi42MTU3MiAxOS41NzUzIDIuODI2NDQgMTkuOTUwMyAzLjIwMTUxQzIwLjMyNTQgMy41NzY1OCAyMC41MzYxIDQuMDg1MjkgMjAuNTM2MSA0LjYxNTcyVjE4LjYxNTdDMjAuNTM2MSAxOS4xNDYyIDIwLjMyNTQgMTkuNjU0OSAxOS45NTAzIDIwLjAyOTlDMTkuNTc1MyAyMC40MDUgMTkuMDY2NiAyMC42MTU3IDE4LjUzNjEgMjAuNjE1N0gxNC41MzYxIiBzdHJva2U9IiNFRjUzM0YiIHN0cm9rZS13aWR0aD0iMS42IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTkuNTM2MTMgMTYuNjE1N0wxNC41MzYxIDExLjYxNTdMOS41MzYxMyA2LjYxNTcyIiBzdHJva2U9IiNFRjUzM0YiIHN0cm9rZS13aWR0aD0iMS42IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTE0LjUzNjEgMTEuNjE1N0gyLjUzNjEzIiBzdHJva2U9IiNFRjUzM0YiIHN0cm9rZS13aWR0aD0iMS42IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==">
                                    </span></button>
                                </x-forms.auth-form_mob2>
                            </li>
                        </ul>

                </div>

            @endauth

            @guest()
                <div class="formLogin">
                    <div class="formLogin__mobile">
                        @include('auth.forms.f-login')
                    </div>
                </div>
            @endguest
        </div>
    </div>


</div><!--.mob_menu_content-->

<div class="mobile_menu">
    <div class="mob_flex">



        <a class="m_f m_f1 {{ active_linkMenu(asset(route('home'))) }}" href="/">
            <div class="m_img"></div>
            <span>{{ __('Главная') }}</span>
        </a>
        <div class="m_f m_f3" data-mf="m_f3">
            <div class="m_img"></div>
            <p>{{ __('Меню') }}</p>
        </div>
        <div class="m_f m_f4" data-mf="m_f4">
            <div class="m_img"></div>
            <span>{{ __('Контакты') }}</span>
        </div>
        <div class="m_f m_f5" data-mf="m_f5">
            <div class="m_img"></div>
            <p>{{ __('Кабинет') }}</p>
        </div>


    </div>
</div>
