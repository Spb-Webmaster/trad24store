@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Новости для  - {{ $user->user }} "
    description="Новости"
    keywords="Новости"
/>
@section('cabinet')
    <main class="m_cabinet">

        <div class="auth">
            <div class="cabinet">
                <div class="block">

                    @include('dashboard._partial.top')

                    <div class="cabinet__flex  height_100">
                        <div class="cabinet__left">
                            <div class="cl">

                                @include('dashboard.left_bar.left')

                            </div>
                        </div>
                        <div class="cabinet__right">
                            @include('dashboard.menu.cabinet_menu')

                            <div class="cabinet_radius12_fff">


                                <div class="c__title_subtitle">
                                    <h3 class="F_h1">{{ __('Новости') }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{ __('Новости от администрации портала') }}</span>
                                    </div>
                                </div>

                                @if(count($items))
                                    <div class="user_page">

                                        <div class="m_items">
                                            @foreach($items as $item)
                                                <a href="{{ route('m_user_new', ['id' => $item->id]) }}" class="a_temp">

                                                    @if($item->image)
                                                        <div class="m_item__flex">
                                                            <div class="m_item__left">

                                                                <img width="250" height="188"
                                                                     src="{{ intervention('250x188', $item->image, 'user_page', 'cover')  }}"
                                                                     alt="{{ $item->title }}"/>

                                                            </div>

                                                        <div class="m_item__right">
                                                            @endif


                                                            <div class="user_item_title">{{ $item->title }}</div>
                                                            <div
                                                                class="user_item_teaser desc">{!!  $item->teaser !!}</div>
                                                            <div
                                                                class="user_item_date">{{ rusdate3($item->created_at) }}</div>

                                                              @if($item->image)
                                                                      </div>
                                                        </div>
                                                              @endif
                                                </a>
                                            @endforeach
                                            {{ $items->withQueryString()->links('pagination::default') }}

                                        </div>

                                    </div>

                                @endif


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection



