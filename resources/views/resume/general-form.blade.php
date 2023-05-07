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
            <x-input class="block w-full dark:text-gray-50" id="full_name" type="text" wire:model.defer="state.full_name"
                autocomplete="full_name" placeholder="{{ __('resume.full_name') }}" />
            <x-input-error class="mt-2" for="state.full_name" />
        </div>
        <div class="col-span-6">
            <div class="inline-flex w-full items-center gap-3">
                <x-label class="whitespace-nowrap">{{ __('National ID') }}</x-label>
                <x-input dir="ltr" class="block w-full dark:text-gray-100" wire:model.defer="state.national_id"
                    type="text" placeholder="10..." />

            </div>
            <x-input-error class="mt-2" for="state.national_id" />
        </div>
        <div class="col-span-6">
            <div class="inline-flex w-full" dir="ltr">
                <x-select class="w-25 block text-sm dark:text-gray-100" id="phone_code" name="phone_code"
                    :options="['966' => '🇸🇦 +966']" wire:model.defer="state.phone_code" />

                <x-input class="block w-full dark:text-gray-100" id="phone" type="tel"
                    wire:model.defer="state.phone" autocomplete="tel" placeholder="5..." />
            </div>
            <x-input-error class="mt-2" for="state.phone" />
        </div>
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100" id="is_saudi" name="is_saudi"
                wire:model.defer="state.is_saudi" :options="[1 => __('Saudi'), 0 => __('None Saudi')]" />
            <x-input-error class="mt-2" for="state.is_saudi" />
        </div>
        <!-- Date of birth -->
        <div class="col-span-3">
            <div class="inline-flex w-full">
                <x-label class="mt-2 dark:text-gray-100" for="date_of_birth" value="{{ __('resume.date_of_birth') }}" />
                <x-input class="block w-full dark:text-gray-100" id="date_of_birth" type="date"
                    wire:model.defer="state.birth_date" />
            </div>
            <x-input-error class="mt-2" for="state.birth_date" />
        </div>

        <!-- single or married -->
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100" id="marital_status" name="marital_status"
                wire:model.defer="state.is_single" :options="[
                    1 => __('Single'),
                    0 => __('Married'),
                ]" />
            <x-input-error class="mt-2" for="state.is_single" />
        </div>
        {{-- Gender --}}
        <div class="col-span-3">
            <x-select class="block w-full dark:text-gray-100" id="gender" name="gender"
                wire:model.defer="state.is_male" :options="[
                    1 => __('Male'),
                    0 => __('Female'),
                ]" />
            <x-input-error class="mt-2" for="state.is_male" />
        </div>


        <!-- Address -->
        <div class="col-span-6">
            {{-- <x-label for="address" value="{{ __('resume.address')}}" /> --}}
            <x-input class="block w-full dark:text-gray-100" id="address" type="text" wire:model.defer="address"
                autocomplete="address" placeholder="{{ __('resume.address') }}" />
            <x-input-error class="mt-2" for="address" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
