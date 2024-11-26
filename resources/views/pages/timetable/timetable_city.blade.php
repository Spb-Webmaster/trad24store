@extends('layouts.layout')
<x-seo.meta
    title="{{($timetable_city->metatitle)?:$timetable_city->title}}"
    description="{{$timetable_city->description}}"
    keywords="{{$timetable_city->keywords}}"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('timetable')}}">{{__('Расписание')}}</a> •</li>
                    <li><span>{{ $timetable_city->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание — {{ $timetable_city->title }}</h1>
            @if($timetable_city->subtitle)
                <div class="subtitle">{{ $timetable_city->subtitle }}</div>
            @endif


            <div class="row_100">
                @include('include.modals.temp_forms.timetable')
            </div>
            <div class="row_100">
                @if($timetable_city->text)
                    <div class="desc border_b pad_t17">
                        {!! $timetable_city->text !!}
                    </div>
                @endif
            </div>


        </div>


    </main>
@endsection

