@props([
   'published' => 1,
   'active' => 1
])


@if(!$active)
    <div class="row_h_moderation_red">
        <span class="ic_red"></span><i>Отклонен</i>
    </div><!--.row_h-->

    @else
    @if($published)
        <div class="row_h_moderation_green">
            <span class="ic_"></span><i>Отчет принят</i>
        </div><!--.row_h-->
    @else
        <div class="row_h_moderation_yellow">
            <span class="ic_yellow"></span><i>На модерации</i>
        </div><!--.row_h-->
    @endif


@endif

