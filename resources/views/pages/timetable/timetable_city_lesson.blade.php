@extends('layouts.layout')
<x-seo.meta
    title=""
    description=""
    keywords=""
/>

@section('content')
    <main class="{{ route_name() }}">
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('timetable')}}">{{__('Расписание')}}</a> •</li>
                    <li><span>{{ $lesson->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание — {{ $lesson->title }}</h1>

            <div class="row_100">

                <div class="desc">
                    {!! $lesson->text !!}
                </div>

            </div>


        </div>


    </main>
@endsection

