<footer class="footer_F5F5F7">
    <div class="block">

        <div class="f_top_flex">
            <div class="f_top__left">


                    <div class="F_tel"><span><a href="tel:{{ config2('moonshine.setting.phone1') }}">{{ config2('moonshine.setting.phone1') }}</a></span></div>
                    <div class="F_email"><span>{{ config2('moonshine.setting.email') }}</span></div>

                    <div class="I_Social">
                      @include('include.blocks.social.social_bottom')
                    </div>

            </div>

            <div class="f_top__right">


                <div class="f1">
                    <ul class=""><li  class="item-160"><a href="/reestr/neprofessionalnye-mediatory">Общественные медиаторы</a></li><li  class="item-161"><a href="/reestr/professionalnye-mediatory">Профессиональные медиаторы</a></li><li  class="item-265"><a href="/reestr/organizatsii-mediatorov">Организации Медиаторов</a></li><li  class="item-162"><a href="/raspisanie/diplom">Поиск диплома </a></li></ul>
                    <div class="codehtml">
                    </div>






                </div>

                <div class="f2">
                    <ul class=""><li  class="item-175"><a href="/o-nas/assotsiatsiya">Ассоциация</a></li><li  class="item-176"><a href="/o-nas/struktura">Структура</a></li><li  class="item-177"><a href="/o-nas/dokumenty">Документы</a></li><li  class="item-191"><a href="/o-nas/partnery">Парнеры </a></li><li  class="item-193"><a href="/o-nas/komanda">Команда</a></li></ul>
                    <div class="codehtml">
                    </div>






                </div>
                <div class="f3">
                    <ul class=""><li  class="item-180"><a href="/uslugi/korporativnye-spory">Корпоративные споры </a></li><li  class="item-181"><a href="/uslugi/bankovskie-spory">Банковские споры</a></li><li  class="item-182"><a href="/uslugi/ugolovnye-spory">Уголовные споры </a></li><li  class="item-183"><a href="/uslugi/trudovye-spory">Трудовые споры </a></li><li  class="item-184"><a href="/uslugi/semejnye-spory">Семейные споры </a></li><li  class="item-187"><a href="/uslugi/razdel-imushchestva">Раздел имущества </a></li><li  class="item-186"><a href="/uslugi/spory-mezhdu-yur-litsami">Споры между юр. лицами </a></li></ul>
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
