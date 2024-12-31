<header>
    <div class="wrapp_block">

        <div class="t_line_flex">
            <div class="white_line"></div>
        </div>
        <div class="t_line_flex">
            <div class="white_line2"></div>
            <div class="grey_line40"></div>
        </div><!--.t_line_flex-->

        <div class="block block_1">
            <div class="block_1_abslol">
                <div class="flex_row">
                    <div class="block_1_left">
                        @include('include.blocks.logo.top_logo')
                    </div><!--.col-->
                    <div class="block_1_center top_menu">
                        <div class="dj-megamenu-wrapper">

                            @include('include.menu.menu_top')

                        </div>
                    </div><!--.col-->
                    <div class="block_1_right">
                        <div class="soc_tel">
                            <div class="SFlex soc_tel__left">
                   @include('include.blocks.social.social_top')
                            </div>

                            <div class="soc_tel__right">
                                @include('include.blocks.cities.top_cities')

                            </div>
                        </div>
                        <div class="flex_row">
                            <div class="w_71_px bor_r">
                                <div class="u_1"><a href="#mod_search" class=" modal-trigger"><img
                                            src="{{ Storage::url('/images/axeld/lupa.svg') }}" alt="Поиск"></a></div>
                            </div>
                            <div class="m_cab">
                                <a class="link_to_profile modal-trigger" href="{{ route('login') }}"><img
                                        src="{{ Storage::url('/images/axeld/icons/Off.svg') }}" alt="Аватар"><span><i>Мой</i> Кабинет</span></a>


                            </div>
                            <div class="m_lang">
                                <div class="language">
                                    <div class="top_translate">
                                        @include('include.translate.translate')
                                    </div>
                                </div><!--.language-->

                            </div>
                        </div>
                    </div><!--.col-->
                </div>
            </div>
        </div><!--.block_1-->

    </div>
</header>
