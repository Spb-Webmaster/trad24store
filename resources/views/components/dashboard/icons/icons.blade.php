@props([
   'legal' => 'Страница верифицирована',
   'quality' => 'Специалист высокого качества',
   'security'=> 'Работать со специалистом безопасно',
])
<div class="super_star">
    <div class="_legal" title="{{$legal}}"></div>
    <div class="_quality" title="{{$quality}}"></div>
    <div class="_security" title="{{$security}}"></div>
</div>

