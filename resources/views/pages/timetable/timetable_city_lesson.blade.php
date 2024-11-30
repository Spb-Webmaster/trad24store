@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($lesson_item->metatitle))?$lesson_item->metatitle:$lesson_item->title}}"
    description="{{$lesson_item->description}}"
    keywords="{{$lesson_item->keywords}}"
/>
@section('canonical')
<link rel="canonical" href="http://mediator.test/raspisanie/almaty/professionalnyy-mediator"/>
@endsection

@section('content')
    <main class="{{ route_name() }}">
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('timetable')}}">{{__('Расписание')}}</a> •</li>
                    <li><span>{{ $lesson_item->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание — {{ $lesson_item->title }}</h1>

            <div class="row_100">
                @if($lesson_item->text)
                    <div class="desc border_b">
                        {!! $lesson_item->text !!}
                    </div>
                @endif
                @if(isset($lesson_item->timetable_city))
                    <div class="city_tags">
                        <div class="city_tags__title">{{__('Города проведения')}}</div>
                        <div class="city_tags__flex">
                            @foreach($lesson_item->timetable_city as $city)
                                <span class="city_tag">
                            {{ $city->title }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(isset($lesson_item->timetable_month))
                    <div class="month_tags">
                        <div class="month_tags__title">{{__('Месяцы проведения')}}</div>
                        <div class="month_tags__flex">
                            @foreach($lesson_item->timetable_month as $month)
                                <span class="month_tag">
                            {{ $month->title }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                @endif


                <div class="row_100">
                    @include('include.modals.temp_forms.timetable_full_lesson')
                </div>


            </div>


        </div>


    </main>
@endsection

