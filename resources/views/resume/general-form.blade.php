<x-form-section submit="update">
    <x-slot name="title">
        {{ __('resume.general') }}
    </x-slot>

    <x-slot name="description">
        {{ __('resume.general_description') }}
    </x-slot>

    <x-slot  name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="full_name" value="{{ __('resume.full_name') }}" />
            <x-input id="full_name" type="text" class="mt-1 block w-full" wire:model.defer="state.full_name" autocomplete="full_name" />
            <x-input-error for="full_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('resume.phone') }}" />
            {{-- <select id="phone_code" wire:model.defer="state.phone_code" class="mt-1 block w-1/4">
                <option value="1">🇸🇦+966</option>
            </select> --}}
            <x-select class="" id="phone_code"
                        name="phone_code"
                        :options="$phoneCodes"
                        wire:model.defer="state.phone_code"/>
            <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone" autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>
        <!-- Nationality -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nationality" value="{{ __('resume.nationality') }}" />
            <x-input id="nationality" type="text" class="mt-1 block w-full" wire:model.defer="state.nationality" autocomplete="nationality" />
            <x-input-error for="nationality" class="mt-2" />
        </div>
        <!-- Date of birth -->
        {{-- Date type input --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="date_of_birth" value="{{ __('resume.date_of_birth')}}" />
            <x-input id="date_of_birth" type="date" class="mt-1 block w-full" wire:model.defer="state.date_of_birth" autocomplete="date_of_birth" />
            <x-input-error for="date_of_birth" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('resume.address')}}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>