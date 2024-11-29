@extends('layouts.layout')
<x-seo.meta
    title="Организации медиаторов"
    description="Организации медиаторов"
    keywords="Организации"
/>

@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><span>{{ __('Организации медиаторов')}}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">Организации медиаторов</h1>
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



