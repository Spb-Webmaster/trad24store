@extends('layouts.layout')
<x-seo.meta
    title="{{ (config2('moonshine.diplom.metatitle'))?:'' }}"
    description="{{ (config2('moonshine.diplom.description'))?:'' }}"
    keywords="{{ (config2('moonshine.diplom.keywords'))?:'' }}"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('timetable')}}">{{__('Расписание')}}</a> •</li>
                    <li><span>{{ __('Поиск диплома')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">  {!! config2('moonshine.diplom.title') !!}</h1>

            <div class="row_100">
                <div class="desc">
                 {!! config2('moonshine.diplom.index_desc') !!}
                </div>

                <div class="search_diplom">
                    @include('include.modals.temp_forms.search_diplom')
                </div>

                @if(config2('moonshine.diplom.faq_title'))
                    <div class="faq">
                        <div class="block">
                            <div class="faq_title"><h2 class="h2">{{ config2('moonshine.diplom.faq_title')}}</h2></div>

                            @foreach(config2('moonshine.diplom.faq') as $k=>$faq)
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


        </div>


    </main>
@endsection



