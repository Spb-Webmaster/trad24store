<div class="F_form F_form_search_diplom" id="timetable">


    <div class="new__temp_middle">
        <div class="new__temp_middle_search_diplom">


            <div class="form_text">
            </div>

            <div class="alax_inputs__flex">
                <div class="i__left">

                    <div class="text_input _timetable_city">
                        <div class="selectClass timetable_city">
                            <select class="js-chosen" name="timetable_city" id="registerTimetable_city">

                                @if(isset($timetable_cities))
                                    <option value="">Выбрать город</option>

                                    @foreach($timetable_cities as $city)
                                        <option
                                            @if(isset($timetable_city)) @if($timetable_city->slug == $city->slug ) selected
                                            @endif  @endif  value="{{ $city->slug }}">{{ $city->title }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <label class="labelInput show" for="registerTimetable_city"></label>
                            <x-forms.error class="error_timetable_city"/>

                        </div>

                    </div>
                    <div class="text_input _timetable_month">
                        <div class="selectClass timetable_month">
                            <select class="js-chosen" name="timetable_month" id="registerTimetable_month">

                                @if(config('site.year'))
                                    <option value="">Выбрать месяц</option>

                                    @foreach(config('site.year') as $k =>$month)
                                        <option
                                            @if(isset($session_mounth))
                                                @if(strtolower($session_mounth) ==  $k )
                                                    selected
                                                 @endif
                                            @else
                                                @if(strtolower(Carbon\Carbon::now()->format('F')) ==  $k )
                                                    selected
                                                 @endif
                                            @endif

                                                value="{{ $k }}">{{  $month }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <label class="labelInput show" for="registerTimetable_month"></label>
                            <x-forms.error class="error_timetable_month"/>

                        </div>

                    </div>

                </div>

                <div class="i__right">


                </div>
            </div><!--.alax_inputs__flex-->


        </div>
    </div><!--.new__temp_middle-->

    <div class="F_form_timetable__result" id="timetable__result">
        <x-forms.loader class="br_12"/>
        <div class="F_form_timetable__data">
            @if(isset($lessons_month))
                {!!  $lessons_month !!}
            @endif
        </div>


    </div>

</div><!--.F_form_search_diplom-->


