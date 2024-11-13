<div class="mod_news">
    <div class="block">
        <h2 class="h1">Полезное</h2>

        <div class="slick_slider__carusel">

            @if($collection)
                @foreach($collection as $item)



                    <div class="item14 ">
                        <a href="{{ route($item->route_item, ['slug' =>  $item->slug ]) }}" class="wi33">
                            <div class="wi33_top">
                                <span class="wi33date">Медиация</span><span>Обучение</span>
                            </div><!--.wi33_top-->
                            <div class="wi33_mid">
                               {{ $item->title }}
                            </div><!--.wi33_mid-->
                            <div class="wi33_bottom">
                                <span>{{ $item->text_teaser }}</span>
                            </div><!--.wi33_bottom-->
                        </a>
                    </div>

                @endforeach
            @endif
        </div>

    </div>
</div>
