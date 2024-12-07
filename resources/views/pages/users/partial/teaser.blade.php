<div class="m_option_m">
    <div class="row_flex">
        <div class="col_ava">

            <div class="row_h_m">
                <a href="{{ route($route, ['id' => $item->id]) }}">
                    <div class="m_avamed"
                         style="background-image: url('{{Storage::url($item->avatar)}}')"></div>
                </a>
            </div>


        </div>
        <div class="col_content">

            <div class="row_content_flex_1">

                <div class="m_tleft">
                    @include('pages.users.partial.stars', ['star' =>  (!is_null($item->stars))?$item->stars:0 ])
                </div>

                <div class="m_tright">
                    Количество проведенных медиаций: <span>{{ $item->user_mediator_sum }}</span>
                </div>

            </div>


            <div class="row_username">
                <a href="{{ route($route, ['id' => $item->id]) }}"><span>{{ $item->username }}</span></a>
            </div>


            @if($item->user_list_visible)
                <div class="row_sphere">
                    <span>Виды медиации: </span><span class="sp_sphere">
                    @foreach($item->user_list as $user_list){{ $user_list->title }}@if ($loop->last)
                            @else,
                            @endif
                    @endforeach
                    </span>
                </div>
            @endif

            <div class="row_address ">
                <span><i>Город:</i> {{$item->user_first_city}}</span>, <span>{{$item->street}}</span>,
                <span>{{$item->home}}</span>@if($item->phone) <span> · {{format_phone($item->phone)}}</span> @endif · <span
                    class="blue_color">{{$item->email}}</span>
            </div>

        </div>
    </div>
</div>

