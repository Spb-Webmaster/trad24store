@extends('layouts.layout')
<x-seo.meta
    title="Профессиональные медиаторы"
    description="Профессиональные медиаторы"
    keywords="Профессиональные"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Профессиональные медиаторы')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Профессиональные медиаторы</h1>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.users.partial.left_menu', ['route' => 'prof_mediators'])

                </div>
                <div class="center_content">


                </div>
            </div>

        </div>


    </main>
@endsection



