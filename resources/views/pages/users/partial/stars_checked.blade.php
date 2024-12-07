<div class="s_stars_s">
    <div class="rating-area" id="">
        <input type="radio"  id="star-5"  @if($star == 5 ) checked @endif @if(isset($name)) name="{{ $name }}" @endif  value="5">
        <label for="star-5"></label>
        <input type="radio"  id="star-4"  @if($star == 4 ) checked @endif @if(isset($name)) name="{{ $name }}" @endif value="4">
        <label for="star-4"></label>
        <input type="radio"   id="star-3" @if($star == 3 ) checked @endif @if(isset($name)) name="{{ $name }}" @endif value="3">
        <label for="star-3"></label>
        <input type="radio"  id="star-2"  @if($star == 2 ) checked @endif @if(isset($name)) name="{{ $name }}" @endif value="2">
        <label for="star-2"></label>
        <input type="radio" id="star-1" @if($star == 1 ) checked @endif @if(isset($name)) name="{{ $name }}" @endif value="1">
        <label for="star-1"></label>
    </div>
</div>
