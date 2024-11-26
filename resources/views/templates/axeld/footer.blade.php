<footer class="footer_F5F5F7">
    <div class="block">

        <div class="f_top_flex">
            <div class="f_top__left">


                <div class="F_tel"><span><a
                            href="tel:{{ config2('moonshine.setting.phone1') }}">{{ config2('moonshine.setting.phone1') }}</a></span>
                </div>
                <div class="F_email"><span>{{ config2('moonshine.setting.email') }}</span></div>

                <div class="I_Social">
                    @include('include.blocks.social.social_bottom')
                </div>

            </div>

            <div class="f_top__right">


                <div class="f1">
                    <ul class="">
                        <li><a href="#">Общественные медиаторы</a></li>
                        <li class=""><a href="#">Профессиональные медиаторы</a></li>
                        <li class=""><a href="#">Организации Медиаторов</a></li>
                        <li class="{{ active_linkMenu(asset(route('timetable_diplom'))) }}"><a href="{{ route('timetable_diplom') }}">Поиск диплома </a></li>
                    </ul>
                    <div class="codehtml">
                    </div>


                </div>

                <div class="f2">

                    @if(isset($categories))
                        <ul class="">

                            @foreach($categories as $item)

                                @if($item->published_menu)
                                    <li class="{{ active_linkMenu(asset(route('category', ['slug' => $item->slug])), 'find')  }}">
                                        <a href="{{ route('category', ['slug' => $item->slug]) }}">{{ ($item->title_menu)?: $item->title }}</a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    @endif

                    <div class="codehtml">
                    </div>


                </div>
                <div class="f3">
                    @if(isset($services))
                        <ul class="">

                            @foreach($services as $item)

                                @if($item->published_menu)
                                    <li class="{{ active_linkMenu(asset(route('service', ['slug' => $item->slug])), 'find')  }}">
                                        <a href="{{ route('service', ['slug' => $item->slug]) }}">{{ ($item->title_menu)?: $item->title }}</a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    @endif

                    <div class="codehtml">
                    </div>


                </div>
            </div>
        </div>
        <div class="f_bottom_flex">
            <div class="f_bottom__left">© 1998 - {{ date("Y") }} <br>
                {{ config2('moonshine.setting.contact_copy') }}</div>
            <div class="f_bottom__right">{{ config2('moonshine.setting.contact_copy2') }}</div>

        </div>
    </div>
</footer>
