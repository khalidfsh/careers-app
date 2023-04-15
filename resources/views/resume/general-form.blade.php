<x-form-section submit="save">
    <x-slot name="title">
        {{ __('resume.general') }}
    </x-slot>

    <x-slot name="description">
        {{ __('resume.general_description') }}
    </x-slot>

    <x-slot name="form">
        <!-- Full Name -->
        <div class="col-span-6">
            {{-- <x-label for="full_name" value="{{ __('resume.full_name') }}" /> --}}
            <x-input class="block w-full dark:text-gray-50"
                id="full_name"
                type="text"
                wire:model.defer="state.full_name"
                autocomplete="full_name"
                placeholder="{{ __('resume.full_name') }}" />
            <x-input-error class="mt-2"
                for="state.full_name" />
        </div>
        <div class="col-span-6">
            <div class="inline-flex w-full"
                dir="ltr">
                <x-select class="w-25 block text-sm dark:text-gray-100"
                    id="phone_code"
                    name="phone_code"
                    :options="$phoneCodes"
                    wire:model.defer="state.phone_code" />

                <x-input class="block w-full dark:text-gray-100"
                    id="phone"
                    type="tel"
                    wire:model.defer="state.phone"
                    autocomplete="tel"
                    placeholder="5" />
            </div>
            <x-input-error class="mt-2"
                for="state.phone" />
        </div>
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100"
                id="nationality"
                name="nationality"
                :options="$nationalities"
                wire:model.defer="state.nationality" />
            <x-input-error class="mt-2"
                for="state.nationality" />
        </div>
        <!-- Date of birth -->
        <div class="col-span-3">
            <div class="inline-flex w-full">
                <x-label class="mt-2 dark:text-gray-100"
                    for="date_of_birth"
                    value="{{ __('resume.date_of_birth') }}" />
                <x-input class="block w-full dark:text-gray-100"
                    id="date_of_birth"
                    type="date"
                    wire:model.defer="state.date_of_birth"
                    autocomplete="date_of_birth" />
            </div>
            <x-input-error class="mt-2"
                for="state.date_of_birth" />
        </div>

        <!-- single or married -->
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100"
                id="marital_status"
                name="marital_status"
                :options="$isMarried"
                wire:model.defer="state.is_married" />
            <x-input-error class="mt-2"
                for="state.is_married" />
        </div>
        {{-- Gender --}}
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100"
                id="gender"
                name="gender"
                :options="$genders"
                wire:model.defer="state.gender" />
            <x-input-error class="mt-2"
                for="state.gender" />
        </div>


        <!-- Address -->
        <div class="col-span-6">
            {{-- <x-label for="address" value="{{ __('resume.address')}}" /> --}}
            <x-input class="block w-full dark:text-gray-100"
                id="address"
                type="text"
                wire:model.defer="state.address"
                autocomplete="address"
                placeholder="{{ __('resume.address') }}" />
            <x-input-error class="mt-2"
                for="state.address" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3"
            on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
