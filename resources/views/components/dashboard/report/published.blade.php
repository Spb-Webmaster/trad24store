@props([
   'published' => 1
])

    @if($published)
        <div class="row_h_moderation_green">
            <span class="ic_"></span><i>Отчет принят</i>
        </div><!--.row_h-->
    @else
        <div class="row_h_moderation_yellow">
            <span class="ic_yellow"></span><i>На модерации</i>
        </div><!--.row_h-->
    @endif

