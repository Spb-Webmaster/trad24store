<div class="rating-result">
    @if(isset($star))
        @for($i=1;$i<=5;$i++)
            @if($star>=$i)
                <span  data-active="{{ $star }}" class="active"></span>
            @else
                <span></span>

            @endif

        @endfor

    @endif

</div>
