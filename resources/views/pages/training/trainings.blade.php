@extends('layouts.layout')
<x-seo.meta
    title="{{ (config2('moonshine.training.metatitle'))?:'' }}"
    description="{{ (config2('moonshine.training.description'))?:'' }}"
    keywords="{{ (config2('moonshine.training.keywords'))?:'' }}"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Обучение')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Обучение</h1>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.partial.left_menu', ['route' => 'service'])
                </div>
                <div class="center_content">

                    @if(config2('moonshine.training.index_desc'))
                        <div class="desc index_desc">
                            {!! config2('moonshine.training.index_desc') !!}
                        </div>
                    @endif

                </div>
            </div>
            @if(config2('moonshine.training.faq_title'))
                <div class="faq">
                    <div class="block">
                        <div class="faq_title"><h2 class="h2">{{ config2('moonshine.training.faq_title')}}</h2></div>

                        @foreach(config2('moonshine.training.faq') as $k=>$faq)
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


