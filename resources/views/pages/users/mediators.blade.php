@extends('layouts.layout')
<x-seo.meta
    title="Медиаторы"
    description="Медиаторы"
    keywords="Медиаторы"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Медиаторы')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Медиаторы</h1>
            <div class="content_Flex">
                <div class="left_bar">

                </div>
                <div class="center_content">


                </div>
            </div>

        </div>


    </main>
@endsection


