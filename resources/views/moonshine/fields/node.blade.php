<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="4" colSpan="4">
        <x-moonshine::box :dark="true" title="Первый">
          {{ __('Смена средства связи, только после НАЖАТИЯ на ссылку. Остальные средства связи не меняются.') }}

        </x-moonshine::box>
    </x-moonshine::column>
    <x-moonshine::column adaptiveColSpan="4" colSpan="4">
        <x-moonshine::box :dark="true" title="Второй">
            {{ __('Смена всех средств связи через каждый день начиная с 00 часов, по выставленному на сервере времени.') }}
        </x-moonshine::box>
    </x-moonshine::column>
    <x-moonshine::column adaptiveColSpan="4" colSpan="4">
        <x-moonshine::box :dark="true" title="Третий">
            {{ __('Показ выставленных средств связи, без изменений.') }}
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>
