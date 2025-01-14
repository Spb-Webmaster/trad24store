<div class="subscr">
    <div class="Y_h2">Подписка на сервисе</div>
    <p>У вас оформлена подписка. <br>Вы получаете дополнительные преимущества до {{$user->user_pay}} Преимущества
        подписки:</p>

    <div class="li_s">

        @if(config2('moonshine.setting.json_subscr'))
            @foreach(config2('moonshine.setting.json_subscr') as $sub)
                <div class="li_text_s">{{ $sub['json_subscr_label'] }}</div>
            @endforeach
        @endif


    </div>

</div>
