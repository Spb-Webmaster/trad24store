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

                    <ul>
                        <li><a class="" href="#">{{__('Мои полисы')}}</a></li>
                        <li><a class="" href="{{ route('cabinet') }}">{{__('Настройки')}}</a></li>
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
