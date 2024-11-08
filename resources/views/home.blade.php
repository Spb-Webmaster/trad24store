@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
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
        <section class="home_section__news n_sl">
            @include('modules.module_5')
        </section>
        <section class="home_section__partners part_sl">
            @include('modules.module_6')
        </section>
        <hr>
        <section class="home_section__form f_sl">
            @include('modules.module_7')
        </section>

    </main>
@endsection
