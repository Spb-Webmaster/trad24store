<nav>
    <ul class="top_menu">

        <li class="{{ active_linkMenu(config('app.app_url')) }}"><a
                class="add__mobile_menu  {{ active_linkMenu(config('app.app_url')) }}"
                href="{{config('app.app_url')}}">{{ __('Главная') }}</a></li>

        <li class=""><a href="#" class="add__mobile_menu down">О нас</a>

            <ul class="submenu">
                <li class="">
                    <a class="" href="#">Ассоциация</a>
                </li>
                <li class="">
                    <a class="" href="#">Ассоциация</a>
                </li>
                <li class="">
                    <a class="" href="#">Ассоциация</a>
                </li>
                <li class="">
                    <a class="" href="#">Ассоциация</a>
                </li>
            </ul>


        </li>

        <li class="{{ active_linkMenu(asset(route('trainings')), 'find') }}">
            <a href="{{ route('trainings') }}" class="add__mobile_menu down">Обучение</a>

            <ul class="submenu">
                @foreach($trainings as $training)
                    <li class="{{ active_linkMenu(asset(route('training', ['slug'=> $training->slug])), 'find') }}">
                        <a class="{{ active_linkMenu(asset(route('training', ['slug'=> $training->slug])), 'find') }}" href="{{ route('training', ['slug'=> $training->slug])  }}">{{ ($training->title_menu)?:$training->title }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ active_linkMenu(asset(route('services')), 'find') }}">
            <a href="{{ route('services') }}" class="add__mobile_menu down">Услуги</a>

            <ul class="submenu">
                @foreach($services as $service)
                    <li class="{{ active_linkMenu(asset(route('service', ['slug'=> $service->slug])), 'find') }}">
                        <a class="{{ active_linkMenu(asset(route('service', ['slug'=> $service->slug])), 'find') }}" href="{{ route('service', ['slug'=> $service->slug])  }}">{{ ($service->title_menu)?:$service->title }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="{{ active_linkMenu(asset(route('timetable')), 'find') }}">
            <a href="{{ route('timetable') }}" class="add__mobile_menu down">Расписание</a>

            <ul class="submenu">
                @foreach($timetable_cities as $timetable_city)
                    <li class="{{ active_linkMenu(asset(route('timetable_city', ['slug'=> $timetable_city->slug])), 'find') }}">
                        <a class="{{ active_linkMenu(asset(route('timetable_city', ['slug'=> $timetable_city->slug])), 'find') }}" href="{{ route('timetable_city', ['slug'=> $timetable_city->slug])  }}">{{ $timetable_city->title }}</a>
                    </li>
                @endforeach
                    <li class="{{ active_linkMenu(asset(route('timetable_diplom'))) }}">
                        <a class="{{ active_linkMenu(asset(route('timetable_diplom'))) }}"
                           href="{{ route('timetable_diplom') }}">Поиск диплома</a>
                    </li>
            </ul>
        </li>

        <li class="{{ active_linkMenu(asset('/contacts')) }}"><a class="add__mobile_menu "
                                                                 href="{{ asset('/contacts') }}">{{ __('Контакты') }}</a>

        </li>
    </ul>
</nav>
