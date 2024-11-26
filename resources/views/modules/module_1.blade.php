<div class="mod_servises">
    <div class="block">
    <h2 class="h1">Наши услуги</h2>

        <div class="I_Flex">

            @if($services5)
            @foreach($services5 as $k=>$service)

                    <div class="az_item az_item{{ $k+1 }}">
                        <div class="az_i_top"><img width="64" height="64" loading="lazy" src="{{ Storage::url($service->img_teaser) }}" alt="{{ ($service->title_teaser)?:$service->title }}"></div>
                        <div class="az_i_middle"><h2>{{ ($service->title_teaser)?:$service->title }}</h2></div>

                        <div class="az_i_bottom"><div class="item_buttom">
                                <a href="{{ route('service', ['slug' => $service->slug ]) }}"><span>Подробнее</span></a></div></div>
                    </div>

            @endforeach
            @endif


        </div>
    </div>
</div>


