@if($category->temp == 'komanda')

    <div class="n_teasers_komanda">
        @foreach($category->mediator_product as $product)
            <div class="my_team_teaser">
                <div class="my_team_post">
                    {{ ($product->subtitle)?:''}}
                </div>
                <div class="my_team_img">
                    <a href="{{ route('product', ['gategory'=>$category->slug,  'slug' => $product->slug]) }}">
                        @if($product->img_teaser)
                        <img width="200" height="267"  alt="Логотип"
                        loading="lazy"
                        src="{{ asset(intervention('200x267', $product->img_teaser, 'product', 'scaleDown')) }}"
                        >
                        @else
                            <img width="200" height="267"  alt="Логотип"
                                 loading="lazy"
                                 src="{{Storage::url('/images/logo__.jpg')}}"
                            >
                        @endif
                    </a>
                </div>
                <h2>
                    <a href="{{ route('product', ['gategory'=>$category->slug,  'slug' => $product->slug]) }}">
                    {{ ($product->title_teaser)?:$product->title }}
                    </a>

                </h2>



            </div>

        @endforeach
    </div>


@else
    <div class="n_teasers_">
        @foreach($category->mediator_product as $product)
            <div class="n_teaser_">
                <h3 class="n_h3">{{ ($product->title_teaser)?:$product->title }}</h3>
                <div class="shortdesc desc">
                    @if(isset($product->text_teaser))
                        {!!  $product->text_teaser  !!}
                    @endif
                </div>

                <a class="button axeld_button_custom_1"
                   href="{{ route('product', ['gategory'=>$category->slug,  'slug' => $product->slug]) }}"><span>Подробнее</span></a>
            </div>

        @endforeach
    </div>
@endif
