@if(auth()->check())
    @if($user = auth()->user() )
        @if($user->manager)

            <div class="m_menu_fixed">
                <div class="m_menu_absol">
                    @include('dashboard.manager.menu._change_itemsmenu')
                </div>
            </div>
            <div class="m_menu">
                <div class="menu_send send"></div>
            </div>

        @endif
    @endif
@endif



