@extends('layouts.layout')
<x-seo.meta
    title="{{($item->metatitle)?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
/>


@section('content')
    <main>
        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('trainings')  }}">{{ __('Обучение')}}</a></li>
                    <li><span>{{ $item->title }}</span></li>
                </ul>

            </div>
        </div>
        <div class="block">
            <h1 class="h1">{{ $item->title }}</h1>
            <div class="subtitle">{{ $item->subtitle }}</div>
            <div class="content_Flex">
                <div class="left_bar">
                    @include('pages.partial.left_menu', ['route' => 'training'])
                </div>
                <div class="center_content">

                    <div class="page_content desc">
                        {!! $item->text !!}
                    </div>
                    @if($item->img_top)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($item->img_top) }}" alt="img"/>

                        </div>
                    @endif
                    <div class="page_content desc">
                        {!! $item->text2 !!}
                    </div>
                    @if($item->img_bottom)
                        <div class="page_content__img">
                            <img src="{{ Storage::url($item->img_bottom) }}" alt="img"/>
                        </div>
                    @endif



                </div>
            </div>
        </div>


    </main>
@endsection


