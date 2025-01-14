<div class="hbox__submenu">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">
   {{--         <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet.policy')), 'find')  }}"><a href="{{ route('cabinet.policy') }}">{{ __('Полисы') }}</a></div>--}}
           {{-- <div class="v_s_c__item"><a href="{{ route('cabinet.test') }}">{{ __('Статьи') }}</a></div>--}}
            <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet')), 'find')  }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></div>
            <div class="v_s_c__item {{ active_linkMenu(asset(route('reports')), 'find')  }}"><a href="{{ route('reports') }}">{{ __('Мои отчеты') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('comments')), 'find')  }}"><a href="{{ route('comments') }}">{{ __('Мои отзывы') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_news')), 'find')  }}"><a href="{{ route('m_user_news') }}">{{ __('Новости') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_ads')), 'find')  }}"><a href="{{ route('m_user_ads') }}">{{ __('Объявления') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_laws')), 'find')  }}"><a href="{{ route('m_user_laws') }}">{{ __('Законы') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_user_docs')), 'find')  }}"><a href="{{ route('m_user_docs') }}">{{ __('Документы') }}</a></div>

            @if(auth()->user()->manager)
            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_users')), 'find')  }}"><a href="{{ route('m_users') }}">{{ __('Медиаторы') }}
                    @if($users_no_publiched)
                    <span class="_int">{{ $users_no_publiched }}</span>
                    @endif
                </a></div>
            <div class="v_s_c__item {{ active_linkMenu(asset(route('m_reports')), 'find')  }}"><a href="{{ route('m_reports') }}">{{ __('Отчеты') }}
                    @if($report_no_publiched)
                        <span class="_int">{{ $report_no_publiched }}</span>
                    @endif
                </a></div>
                <div class="v_s_c__item {{ active_linkMenu(asset(route('m_comments')), 'find')  }}"><a href="{{ route('m_comments') }}">{{ __('Отзывы') }}
                    @if($comment_no_publiched)
                        <span class="_int">{{ $comment_no_publiched }}</span>
                    @endif
                </a></div>
            @endif

        </div>
        <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>

    </div>
</div>

