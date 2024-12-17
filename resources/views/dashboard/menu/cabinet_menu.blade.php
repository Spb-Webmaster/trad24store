<div class="hbox__submenu">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">
   {{--         <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet.policy')), 'find')  }}"><a href="{{ route('cabinet.policy') }}">{{ __('Полисы') }}</a></div>--}}
           {{-- <div class="v_s_c__item"><a href="{{ route('cabinet.test') }}">{{ __('Статьи') }}</a></div>--}}
            <div class="v_s_c__item {{ active_linkMenu(asset(route('cabinet')), 'find')  }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></div>
        </div>
        <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>

    </div>
</div>

