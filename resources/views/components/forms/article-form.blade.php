@props([
   'action' => '',
   'method' => 'post',
   'buttons' => '',
])
<div class="blockForm">

    <form class="form"
          action="{{ $action }}"
          method="{{ $method }}"

    >   @honeypot
        @csrf
        {{ $slot  }}
        {{ $buttons  }}
    </form>
</div><!--.blockForm-->
