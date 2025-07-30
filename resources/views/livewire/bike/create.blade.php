<?php

use App\Models\Bike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use App\Http\Requests\StoreBikeRequest;

new class extends Component {

    public Bike $bike;
    /**
     * Mount the component.
     */
    public function mount(): void
    {

    }

    public function createBike(StoreBikeRequest $request): void
    {
        $user = Auth::user();

        $request->validated();

        $this->dispatch('bike-created', name: $user->name);
    }


}?>
<section class="w-full">

        <flux:heading size="xl" level="1">{{ __('Bike') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your bikes') }}</flux:subheading>
        <flux:separator variant="subtle" />
        <x-bike.layout :heading="__('New bike!')" :subheading="__('Create your bike')">
            <form wire:submit="createBike" class="my-6 w-full space-y-6">
                <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />


                    <flux:input wire:model="brand" :label="__('Model')" type="text" required autocomplete="brand" />
                    <flux:input wire:model="model" :label="__('Brand')" type="text" required autocomplete="model" />
                    <flux:input wire:model="total_km" :label="__('Total km')" type="number" />


                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                    </div>

                    <x-action-message class="me-3" on="bike-created">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </x-bike.layout>

</section>

