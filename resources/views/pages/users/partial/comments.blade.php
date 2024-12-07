<div class="com_responce">


        <div class="com_responce_Flex">
            <div class="crth_left"><span>Отзывы</span></div><!--.crth_left-->
            <div class="crth_right"><a data-fancybox="" href="#feedback"  class="modal-trigger"><span>Оставить отзыв</span></a>
            </div><!--.crth_right-->
        </div><!--.com_responce_Flex-->

@if(count($comments))
        @foreach($comments as $comment)


            <div class="com_responce_tr">

                <div class="com_responce__flex">
                    <div class="com_responce__left">
                        <div class="com_responce__name">{{ $comment->title }}</div>
                       <div class="com_responce__stars">@include('pages.users.partial.stars', ['star'=> $comment->stars])</div>


                    </div>
                    <div class="com_responce__right">
                        {!! $comment->desc !!}

                    </div>
                </div>

            </div><!--.com_responce_tr-->
        @endforeach
            {{ $comments->withQueryString()->links('pagination::default') }}


    @else

        <div class="com_responce_tr">
        <div class="desc"><p>{{ config('site.constants.responce_not') }}</p></div>
        </div><!--.com_responce_tr-->
@endif









</div><!--.com_responce-->
