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
                    <li><span>Город</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание</h1>

            <div class="row_100">

            </div>

        </div>


    </main>
@endsection



