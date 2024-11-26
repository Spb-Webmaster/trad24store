<div class="left_menu">
    @if(isset($items))
        <ul class="left_m nav menu">

        @foreach($items as $item)

                @if($item->published_menu)
                    <li class="{{ active_linkMenu(asset(route($route, ['slug' => $item->slug])), 'find')  }}">
                        <a href="{{ route($route, ['slug' => $item->slug]) }}">{{ ($item->title_menu)?: $item->title }}</a>
                    </li>
                @endif

        @endforeach
        </ul>
    @endif

</div><!--.left_bar-->
