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

@if($user->status_pay_subscr() == 0)
    <div class="cabinet_radius12_fff yellow_mess">
        @include('dashboard.left_bar._partial.pay_no')
    </div>
    <br>
    <br>
@else
    @if($user->status_pay_subscr() == 1)
        <div class="cabinet_radius12_fff green_mess">
            @include('dashboard.left_bar._partial.pay')
        </div>
        <br>
        <br>
    @endif
    @if($user->status_pay_subscr() == 2)
        <div class="cabinet_radius12_fff yellow_mess">
            @include('dashboard.left_bar._partial.pay_wait')
        </div>
        <br>
        <br>
    @endif
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


<div class="cabinet_radius12_fff">
    @if($user->request_delete)
    @include('dashboard.left_bar._partial.request_delete')
    @else
        @include('dashboard.left_bar._partial.delete_user')

    @endif
</div>
<br>
<br>


<div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
    @include('dashboard.left_bar._partial.logout')
</div>
