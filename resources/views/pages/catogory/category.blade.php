@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($category->metatitle))?$category->metatitle:$category->title}}"
    description="{{$category->description}}"
    keywords="{{$category->keywords}}"
/>


@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ $category->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">{{ $category->title }}</h1>
            <div class="subtitle">{{ $category->subtitle }}</div>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.partial.left_menu', ['route' => 'category'])
                </div>
                <div class="center_content">

                    <div class="page_content desc">
                        {!! $category->text !!}
                    </div>
                    @if($category->img_top)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($category->img_top) }}" alt="img"/>

                        </div>
                    @endif
                    <div class="page_content desc">
                        {!! $category->text2 !!}
                    </div>
                    @if($category->img_bottom)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($category->img_bottom) }}" alt="img"/>
                        </div>
                    @endif
                    @if($category->gallery_visible)
                        <article class="_p_gallery">

                            @foreach($category->gallery as $k => $img)
                                <div class="mItem">
                                    <a href="{{ asset(Storage::disk('moonshine')->url($img)) }}"
                                       data-fancybox="dallery"
                                       data-thumb="{{ asset(intervention('250x188', $img, 'category', 'scaleDown')) }}"
                                       data-caption="{{$category->title}}">

                                        <img class="pc_category_img"
                                             style="width: auto; height: auto"
                                             loading="lazy"
                                             src="{{ asset(intervention('250x188', $img, 'category', 'scaleDown')) }}"
                                             alt="photo_{{ $k }}">

                                    </a>
                                </div>

                            @endforeach

                        </article>
                    @endif


                    @if($category->file_visible)
                        <article class="_p_downloads">

                            @foreach($category->file as $k => $file)

                                <div class="">
                                    <a class="axeldzl2" download target="_blank" title="{{ $file['json_file_label'] }}"
                                       href="{{ asset(Storage::disk('moonshine')->url($file['json_file_file'])) }}">
                                        <span class="d_img"></span>
                                        <span class="d_title">{{ $file['json_file_label'] }}</span>
                                    </a>
                                </div>

                            @endforeach

                        </article>

                    @endif


                    @if($category->mediator_product)
                        @include('pages.catogory.partial.teaser')
                    @endif


                </div>
            </div>

            @if(isset($category->faq_title))
                <div class="faq">
                    <div class="block">
                        <div class="faq_title"><h2 class="h2">{{ $category->faq_title}}</h2></div>

                        @foreach($category->faq as $k=>$faq)
                            <div class="faq_question_answer faq__js">
                                <div class="faq_question faq_question__js ">
                                    <span>{{ $faq['faq_question'] }}</span>
                                    <span class="faq_close">+</span>
                                </div>
                                <div class="faq_answer faq_answer__js">
                                    <div class="faq_answer__text desc">{!!  $faq['faq_answer'] !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>


    </main>
@endsection


