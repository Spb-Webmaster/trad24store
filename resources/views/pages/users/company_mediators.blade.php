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
                    @include('pages.users.partial.left_menu', ['route' => 'company_mediators'])


                </div>
                <div class="center_content">
                    @include('pages.users.partial.search', ['route' => 'company_mediators_search',
                    'mediator_search' => (isset($mediator_search))?$mediator_search:'',
                    'mediator_city' => (isset($mediator_city))?$mediator_city:'',
                    'cities' => $cities,
                    'reload' => 'company_mediators'])
                @foreach($items as $item)

                        @include('pages.users.partial.teaser', ['route' => 'company_mediator'])

                    @endforeach

                    {{ $items->withQueryString()->links('pagination::default') }}


                </div>
            </div>

        </div>


    </main>
@endsection



