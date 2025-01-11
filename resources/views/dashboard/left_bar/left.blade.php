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
@if(!$user->user_pay)
    <div class="cabinet_radius12_fff yellow_mess">
        @include('dashboard.left_bar._partial.pay_no')
    </div>
    <br>
    <br>
@else
    <div class="cabinet_radius12_fff green_mess">
        @include('dashboard.left_bar._partial.pay')
    </div>
    <br>
    <br>
@endif




@if( $user->user_mediator_sum )
    <x-dashboard.report.report_sum
        sum="{{$user->user_mediator_sum}}"
        sem="{{$user->user_mediator_sem}}"
        ugo="{{$user->user_mediator_ugo}}"
        gra="{{$user->user_mediator_gra}}"
        kor="{{$user->user_mediator_kor}}"
        uve="{{$user->user_mediator_uve}}"
        tru="{{$user->user_mediator_tru}}"
        ban="{{$user->user_mediator_ban}}"
    />
    <br>
    <br>
@endif


<div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
    @include('dashboard.left_bar._partial.logout')
</div>
