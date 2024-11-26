<div class="mod_training">
    <div class="block">
        <h2 class="h1">Обучение</h2>
        <div class="I_Flex">
            @if($trainings5)
                @foreach($trainings5 as $k=>$training)

                    <div class="az_item az_item1">
                        <a href="#" class="az_i_top"><img src="{{ Storage::url($training->img_teaser) }}" alt="{{ ($training->title_teaser)?:$training->title }}"></a>
                        <div class="az_i_middle"><h2>{{ ($training->title_teaser)?:$training->title }}</h2></div>

                        <div class="az2_i_bottom"><div class="item_buttom2"><a href="{{ route('training', ['slug' => $training->slug ]) }}"><span>Посмотреть курс</span></a></div></div>
                    </div>
                @endforeach
            @endif






        </div>

    </div>
</div>
