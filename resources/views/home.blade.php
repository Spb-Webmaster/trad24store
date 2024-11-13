@extends('layouts.layout')
<x-seo.meta
    title="{{config2('moonshine.index.metatitle')}}"
    description="{{config2('moonshine.index.description') }}"
    keywords="{{config2('moonshine.index.keywords') }}"
/>
@section('content')
    <main>

        <section class="home_section__slider h_sl">
            @include('modules.mod_slider')
        </section>

      <section class="home_section__service s_sl">
            @include('modules.module_1')
        </section>
      <section class="home_section__training t_sl">
            @include('modules.module_2')
        </section>
        <section class="home_section__privilege p_sl">
            @include('modules.module_3')
        </section>
        <section class="home_section__riestr r_sl">
            @include('modules.module_4')
        </section>
        @if(config2('moonshine.index.index_desc'))
            <div class="block">
                <div class="index_desc desc pad_t26 pad_b26">
                    {!! config2('moonshine.index.index_desc') !!}
                </div>
            </div>
        @endif
        <section class="home_section__news n_sl">
            @include('modules.module_5')
        </section>
        <section class="home_section__partners part_sl">
            @include('modules.module_6')
        </section>
        @if(config2('moonshine.index.faq_title'))
            <div class="faq">
                <div class="block">
                    <div class="faq_title"><h2 class="h2">{{ config2('moonshine.index.faq_title')}}</h2></div>

                    @foreach(config2('moonshine.index.faq') as $k=>$faq)
                        <div class="faq_question_answer faq__js">
                            <div class="faq_question faq_question__js ">
                                <span>{{ $faq['faq_question'] }}</span>
                                <span class="faq_close">+</span>
                            </div>
                            <div class="faq_answer faq_answer__js">
                                <div class="faq_answer__text desc">{!!  $faq['faq_answer'] !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else

            <hr>
        @endif

        <section class="home_section__form f_sl">
            @include('modules.module_7')
        </section>

    </main>
@endsection
