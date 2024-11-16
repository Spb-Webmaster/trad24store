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
                    <li><span>{{ __('Расписание')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Расписание</h1>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.partial.left_menu', ['route' => 'service'])
                </div>
                <div class="center_content">



                </div>
            </div>

        </div>


    </main>
@endsection



