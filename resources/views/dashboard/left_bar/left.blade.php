<div class="cabinet_radius12_fff">
    @include('dashboard.left_bar._partial.avatar')
</div>
<br>
<br>
@if($user->published)
<div class="cabinet_radius12_fff green_mess">
    @include('dashboard.left_bar._partial.published_yes')
</div>
<br>
<br>
@else
    <div class="cabinet_radius12_fff yellow_mess">
        @include('dashboard.left_bar._partial.published_no')
    </div>
    <br>
    <br>
@endif
<div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
    @include('dashboard.left_bar._partial.logout')
</div>


