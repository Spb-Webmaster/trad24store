<div class="hbox__submenu">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">

            <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet')), 'find')  }}"><a
                    href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></div>
            <div class="v_s_c__item {{ active_linkMenu(asset(route('reports')), 'find')  }}"><a
                    href="{{ route('reports') }}">{{ __('Отчеты') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('comments')), 'find')  }}"><a
                    href="{{ route('comments') }}">{{ __('Отзывы') }}</a></div>


            @if(auth()->check())
                @if($user = auth()->user() )
                    @if($user->status_pay_subscr() == 1)
                        {{--оплачено--}}
                        <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_news')), 'find')  }}"><a
                                href="{{ route('m_user_news') }}">{{ __('Новости') }}</a></div>

                        <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_ads')), 'find')  }}"><a
                                href="{{ route('m_user_ads') }}">{{ __('Объявления') }}</a></div>

                        <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_laws')), 'find')  }}"><a
                                href="{{ route('m_user_laws') }}">{{ __('Законы') }}</a></div>

                        <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_docs')), 'find')  }}"><a
                                href="{{ route('m_user_docs') }}">{{ __('Документы') }}</a></div>
                    @endif

                @endif

            @endif



        </div>
        <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>

    </div>
</div>

