<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('bike.create')" wire:navigate>{{ __('Create a bike') }}</flux:navlist.item>
            <flux:navlist.item :href="route('bike.appearance')" wire:navigate>{{ __('Change the look') }}</flux:navlist.item>
            <flux:navlist.item :href="route('bike.overview')" wire:navigate>{{ __('View your beauties') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{$slot}}
        </div>
    </div>
</div>
