@if($category->temp == 'komanda')

    <div class="n_full_komanda">
        <div class="_subtitle">
            {{ ($product->subtitle)?:''}}
        </div>

        <div class="n_full_komanda__flex">
            <div class="n_full_komanda_left">
                @if($product->img_teaser)
                    <img width="300" height="400" alt="Логотип"
                         loading="lazy"
                         src="{{ asset(intervention('300x400', $product->img_teaser, 'product', 'scaleDown')) }}"
                    >
                @else
                    <img width="300" height="400" alt="Логотип"
                         loading="lazy"
                         src="{{Storage::url('/images/logo__.jpg')}}"
                    >
                @endif
            </div>
            <div class="n_full_komanda_right">
                <div class="n_full_komanda_options">
                    @if(isset($product->komanda_address))
                        <div class="n_full_komanda_option">
                            <div class="k_label">Адрес:</div>
                            <div class="k_result">{{ $product->komanda_address }}</div>
                        </div>
                    @endif

                        @if(isset($product->komanda_phone1))
                        <div class="n_full_komanda_option">
                            <div class="k_label">Телефон:</div>
                            <div class="k_result">{{ $product->komanda_phone1 }}</div>
                        </div>
                    @endif

                        @if(isset($product->komanda_phone2))
                        <div class="n_full_komanda_option">
                            <div class="k_label">Телефон:</div>
                            <div class="k_result">{{ $product->komanda_phone2 }}</div>
                        </div>
                    @endif

                        @if(isset($product->komanda_phone3))
                        <div class="n_full_komanda_option">
                            <div class="k_label">Моб. телефон:</div>
                            <div class="k_result">{{ $product->komanda_phone3 }}</div>
                        </div>
                    @endif

                        @if(isset($product->komanda_email))
                        <div class="n_full_komanda_option">
                            <div class="k_label">Email:</div>
                            <div class="k_result">{{ $product->komanda_phone3 }}</div>
                        </div>
                    @endif

                        @if(isset($product->komanda_website))
                        <div class="n_full_komanda_option">
                            <div class="k_label">WebSite:</div>
                            <div class="k_result">{{ $product->komanda_website }}</div>
                        </div>
                    @endif

                </div>

            </div>

        </div>


    </div>

@else

@endif
