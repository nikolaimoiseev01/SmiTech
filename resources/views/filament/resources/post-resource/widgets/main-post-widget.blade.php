<x-filament-widgets::widget>
    <x-filament::section>
        <form wire:submit="set_main_post">
            {{ $this->form }}

            <x-filament::button type="submit" class="mt-3">
                Сделать главной новостью
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
