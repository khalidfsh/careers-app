<x-form-section submit="save">
    <x-slot name="title">
        {{ __('resume.general') }}
    </x-slot>

    <x-slot name="description">
        {{ __('resume.general_description') }}
    </x-slot>

    <x-slot  name="form">
        <!-- Full Name -->
        <div class="col-span-4">
            {{-- <x-label for="full_name" value="{{ __('resume.full_name') }}" /> --}}
            <x-input id="full_name" type="text" class="block w-full" wire:model.defer="state.full_name" autocomplete="full_name" placeholder="{{ __('resume.full_name') }}"/>
            <x-input-error for="state.full_name" class="mt-2" />
        </div>
        <div class="col-span-2">
            <x-select class="block w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-100 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        id="nationality"
                        name="nationality"
                        :options="$nationalities"
                        wire:model.defer="state.nationality"/>
            <x-input-error for="state.nationality" class="mt-2" />
        </div>
        <div class="col-span-6">
            <div class="inline-flex w-full" dir="ltr">
                <x-select class="text-gray-500 bg-transparent border-0 border-b-2 border-r-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" id="phone_code"
                            name="phone_code"
                            :options="$phoneCodes"
                            wire:model.defer="state.phone_code"/>

                <x-input id="phone" type="tel" class="block w-full " wire:model.defer="state.phone" autocomplete="tel" placeholder="5" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}"/>
            </div>
            <x-input-error for="state.phone" class="mt-2" />
        </div>
        
        <!-- single or married -->
        <div class="col-span-2">
            <x-select class="block w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-100 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        id="marital_status"
                        name="marital_status"
                        :options="$isMarried"
                        wire:model.defer="state.is_married"/>
            <x-input-error for="state.is_married" class="mt-2" />
        </div>
        {{-- Gender --}}
        <div class="col-span-2">
            <x-select class="block w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-100 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        id="gender"
                        name="gender"
                        :options="$genders"
                        wire:model.defer="state.gender"/>
            <x-input-error for="state.gender" class="mt-2" />
        </div>
        <!-- Date of birth -->
        <div class=" col-span-2">
            <div class="inline-flex w-full">
                <x-label for="date_of_birth" class="mt-2 " value="{{ __('resume.date_of_birth')}}" />
                <x-input id="date_of_birth" type="date" class="block w-full" wire:model.defer="state.date_of_birth" autocomplete="date_of_birth" />
            </div>
            <x-input-error for="state.date_of_birth" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6">
            {{-- <x-label for="address" value="{{ __('resume.address')}}" /> --}}
            <x-input id="address" type="text" class="block w-full" wire:model.defer="state.address" autocomplete="address" placeholder="{{ __('resume.address')}}"/>
            <x-input-error for="state.address" class="mt-2" />
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