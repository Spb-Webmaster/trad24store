@extends('layouts.layout')
<x-seo.meta
    title=""
    description=""
    keywords=""
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

            <div class="row_100">
                @include('include.modals.temp_forms.timetable')
            </div>


        </div>


    </main>
@endsection

