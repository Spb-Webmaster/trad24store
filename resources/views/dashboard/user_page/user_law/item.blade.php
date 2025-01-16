@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ $item->title }}"
    description="{{ $item->title }}"
    keywords="{{ $item->title }}"
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
                                    <h3 class="F_h1">{{ __('Законы') }}</h3>
                                    <div class="F_h2 pad_t5"><span>{{ __('Законы и нормативные акты') }}</span>
                                    </div>
                                </div>

                                <div class="user_page">

                                    <div class="m_items">
                                        <div class="a_temp">
                                            @if($item->json_image_full_page)

                                                <div class="m_item__flex">
                                                    <div class="m_item__left">

                                                        <img width="250" height="188"
                                                             src="{{ intervention('250x188', $item->json_image, 'user_page', 'cover')  }}"
                                                             alt="{{ $item->title }}"/>

                                                    </div>

                                                    <div class="m_item__right">
                                                        @endif


                                                        <div class="user_item_title">{{ $item->title }}</div>

                                                        @if($item->desc)
                                                            <div
                                                                class="user_item_teaser desc">{!!  $item->desc !!}</div>
                                                        @else
                                                            <div
                                                                class="user_item_teaser desc">{!!  $item->teaser !!}</div>
                                                        @endif

                                                        <div
                                                            class="user_item_date">{{ rusdate3($item->created_at) }}</div>

                                                        @if($item->json_image_full_page)
                                                    </div>
                                                </div>
                                            @endif

                                        </div>


                                        @if($item->gallery_visible)
                                            <article class="_p_gallery">

                                                @foreach($item->gallery as $k => $img)
                                                    <div class="mItem">
                                                        <a href="{{ asset(Storage::disk('moonshine')->url($img)) }}"
                                                           data-fancybox="dallery" data-caption="{{$item->title}}">


                                                            <img class="pc_category_img"
                                                                 style="width: auto; height: auto"

                                                                 loading="lazy"
                                                                 src="{{ asset(intervention('292x226', $img, 'category', 'scaleDown')) }}"
                                                                 alt="photo_{{ $k }}">

                                                        </a>
                                                    </div>

                                                @endforeach

                                            </article>
                                        @endif


                                        @if($item->file_visible)
                                            <article class="_p_downloads">

                                                @foreach($item->file as $k => $file)

                                                    <div class="">
                                                        <a class="axeldzl2"
                                                           download="{{ ($file['json_file_title'])?:'document' }}"
                                                           target="_blank" title="{{ $file['json_file_title'] }}"
                                                           href="{{ asset(Storage::disk('moonshine')->url($file['json_file_file'])) }}">
                                                            <span
                                                                class="d_img{{( $file['json_file_format']) ?'_'.$file['json_file_format']:''}}"></span>
                                                            <span class="d_title">{{ $file['json_file_title'] }}</span>
                                                        </a>
                                                    </div>

                                                @endforeach

                                            </article>

                                        @endif


                                    </div>

                                </div>


                            </div>


                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
    </main>
@endsection




