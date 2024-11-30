<div class="m_option_m">
    <div class="row_flex">
        <div class="col_ava">

            <div class="row_h_m">
                <a href="#">
                    <div class="m_avamed"
                         style="background-image: url('{{Storage::url($item->avatar)}}')"></div>
                </a>
            </div>


        </div>
        <div class="col_content">

            <div class="row_content_flex_1">

                <div class="m_tleft">
                    <div class="s_stars_s">
                        <div class="rating-area_survey" id="">
                            <input type="radio" value="5">
                            <label></label>
                            <input type="radio" checked value="4">
                            <label></label>
                            <input type="radio" value="3">
                            <label></label>
                            <input type="radio" value="2">
                            <label></label>
                            <input type="radio" value="1">
                            <label></label>
                        </div>
                    </div>
                </div>

                <div class="m_tright">
                    Количество проведенных медиаций: <span>0</span>
                </div>

            </div>


            <div class="row_username">
                <a href="#"><span>{{ $item->username }}</span></a>
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

