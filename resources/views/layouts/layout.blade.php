<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <title>@yield('title', config('seo.seo.title'))</title>
    <meta name="description" content="@yield('description',  config('seo.seo.description'))"/>
    <meta name="keywords" content="@yield('keywords',  config('seo.seo.keywords'))"/>
    @yield('canonical', '')

</head>
<body>
<div id="content" class="content_ {{ route_name() }} ">
    <x-message.message/>
    <x-message.message_error/>
    @include('templates.axeld.header', ['route' => route_name()]){{--{{ 'Для стиля главной' }}--}}
    <div class="wrapp_block_81"></div>
    @yield('content')
</div><!--.content_-->

@include('templates.axeld.footer')
@include('html.mobile.bottom')
@include('include.connect.connect')
@include('include.modals.temp_forms.call_me')
@include('include.modals.temp_forms.sign_up')
@include('include.modals.temp_forms.bid')
@include('include.modals.temp_forms.feedback')
<div id="dialog-confirm" class="display_none" title="">
    <div class="desc">
    <p><span class="ui-icon ui-icon-alert"></span>Данный файл будет удален</p>
    </div>
</div>


</body>
</html>

