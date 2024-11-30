@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($item->metatitle))?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
/>


@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('services')  }}">{{ __('Услуги')}}</a></li>
                    <li><span>{{ $item->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">{{ $item->title }}</h1>
            <div class="subtitle">{{ $item->subtitle }}</div>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.partial.left_menu', ['route' => 'service'])
                </div>
                <div class="center_content">

                    <div class="page_content desc">
                        {!! $item->text !!}
                    </div>
                    @if($item->img_top)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($item->img_top) }}" alt="img"/>

                        </div>
                    @endif
                    <div class="page_content desc">
                        {!! $item->text2 !!}
                    </div>
                    @if($item->img_bottom)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($item->img_bottom) }}" alt="img"/>
                        </div>
                    @endif



                </div>
            </div>
            @if(isset($item->faq_title))
                <div class="faq">
                    <div class="block">
                        <div class="faq_title"><h2 class="h2">{{ $item->faq_title}}</h2></div>

                        @foreach($item->faq as $k=>$faq)
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

