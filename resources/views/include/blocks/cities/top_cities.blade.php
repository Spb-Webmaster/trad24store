<div class="active_sity">
    <div class="active_sity_flex">
        <span class="black_phone">
              @if(is_null($session_city_phone))
                {{ $city_phone }}
            @else
                {{$session_city_phone}}
            @endif

        </span><span
            class="ssityy">
            @if(is_null($session_city_city))
            {{ $city_city }}
            @else
                {{$session_city_city}}
            @endif
        </span><img class="arrow_bottom_svg" src="{{ Storage::url('/images/axeld/arrow-bottom.svg') }}" alt="arrow">

    </div>



    <div class="list_sitys">
        <div class="wrapp_sity">
            <ul class="cities">
                @if(isset($cities))
                    @foreach($cities as $city)
                        <li class="city_li"><span class="city_li-name">г. {{ $city->city }}</span><a
                                class="city_tel" href="tel:{{ $city->phone }}">{{ $city->phone }}</a></li>
                    @endforeach

                @endif

            </ul>
        </div><!--.wrapp_sity-->
    </div><!--.list_sitys-->
</div>
