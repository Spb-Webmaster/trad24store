<div class="m_option_m">
    <div class="row_flex">
        <div class="col_ava">

            <div class="row_h_m">
                <a href="{{ route($route, ['id' => $item->id]) }}">
                    <div class="m_avamed"
                         style="background-image: url('@if($item->avatar) {{ Storage::disk('public')->url($item->avatar) }} @else {!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!} @endif '); width: 123px; height: 123px"></div>
                </a>
            </div>


        </div>
        <div class="col_content">

            <div class="row_content_flex_1   @if($item->status_pay_subscr()==1) _m_status_pay_subscr_1 @endif">

                <div class="m_tleft">
                    @if($item->status_pay_subscr()==1)
                        {{--платно--}}
                        @if($item->active_stars)

                            @include('pages.users.partial.stars', ['star' =>  (!is_null($item->stars))?$item->stars:0 ])

                        @else

                            <x-dashboard.icons.icons />

                        @endif
                    @else

                        @include('pages.users.partial.stars', ['star' =>  (!is_null($item->stars))?$item->stars:0 ])

                    @endif
                </div>

                <div class="m_tright">

                    @if($item->status_pay_subscr()==1)
                        {{--платно--}}
                        @if($item->active_stars)

                            @include('pages.users.partial.stars', ['star' =>  (!is_null($item->stars))?$item->stars:0 ])

                        @else
                            <div class="color_grey_12 ">Уточните у медиатора{{--Количество проведенных медиаций скрыто медиатором--}}</div>

                        @endif
                    @else

                        <i class="mob_none">Количество проведенных</i> <i class="mob_done">медиаций:</i> <span>{{ $item->user_mediator_sum }}</span>

                    @endif
                </div>

            </div>


            <div class="row_username">
                <a href="{{ route($route, ['id' => $item->id]) }}"><span>{{ $item->username }}</span></a>
            </div>


            @if($item->user_list_visible)
                <div class="row_sphere">
                    <span>Виды медиации: </span><span class="sp_sphere">
                    @foreach($item->user_list as $user_list)
                            @if ($loop->last)
                                {{ $user_list->title }}
                            @else
                                {{ $user_list->title }},
                            @endif
                        @endforeach
                    </span>
                </div>
            @endif

            <div class="row_address ">
                <span><i>Город:</i> {{$item->user_first_city}}</span>, <span>{{$item->street}}</span>,
                @if($item->home)<span class="_m_ho">{{$item->home}}  <i class="ii">·</i>  </span>@endif
                @if($item->phone)
                    <span class="_m_ph">{{format_phone($item->phone)}}</span>
                @endif <i  class="ii">·</i> <span
                    class="blue_color">{{$item->email}}</span>
            </div>

        </div>
    </div>
</div>

