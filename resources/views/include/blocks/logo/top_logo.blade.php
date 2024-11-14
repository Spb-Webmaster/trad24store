<div class="top_logo logo">
    @if(route_name()=='home')
        <div  class="A_logo logo"><img width="248" height="44"  src="{{ Storage::url('/images/logo.svg') }}"  alt="{{ config2('moonshine.setting.slogan1') }}"></div>

    @else
        <a href="{{ route('home') }}" class="logo__img">
          <img width="248" height="44" src="{{ Storage::url('/images/logo.svg') }}" alt="{{ config2('moonshine.setting.slogan1') }}" />

        </a>
    @endif

</div>
