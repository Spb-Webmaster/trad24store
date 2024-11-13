<div class="mod_partners">
    <div class="block">
        <h2 class="h2">Партнеры</h2>
        <div class="part_text">
            <p>Высшая Школа Экономики с большим вниманием относится к выбору партнёров в различных сферах. Работа строится только с теми компаниями которые зарекомендовали себя как профессиональное учреждение и уже внесли вклад в становление и развитие образовательного пространства либо отрасли.</p>

        </div>

        @if($partners)
            <div class="slick_slider__carusel_part _carusel_part">


                @foreach($partners as $partner)

                    <div class="item_part ">
                        <img loading="lazy" width="240" height="50" src="{{ Storage::url($partner->img_teaser) }}" alt="{{ $partner->title }}"/>
                    </div>

                @endforeach

            </div>

            @endif



    </div>
</div>
