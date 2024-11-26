@extends('layouts.layout')
<x-seo.meta
    title="Расписание курсов в определенном городе по месяцам, с формой записи"
    description="Расписание курсов медиаторов"
    keywords="курсы"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Расписание')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание</h1>
            <div class="row_100">
                @include('include.modals.temp_forms.timetable')
            </div>
        </div>
    </main>
@endsection


