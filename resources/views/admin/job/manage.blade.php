<div>
    <div class="mx-auto max-w-7xl py-10 sm:px-6 lg:px-8">
        <form wire:submit.prevent="save">
            <div class="bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-tl-md sm:rounded-tr-md sm:p-6"">
                <div class="grid grid-cols-6 gap-3">
                    <div class="col-span-6">
                        {{-- basic info header (dark mode) --}}
                        <h2 class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-400">{{ __('Basic Info') }}</h2>
                    </div>
                    {{-- type selection --}}
                    <div class="col-span-2">
                        <x-label for="type"
                            value="{{ __('job.type') }}" />
                        <x-select class="mt-1 block w-full dark:text-gray-50"
                            id="type"
                            name="type"
                            wire:model="state.type"
                            autocomplete="type"
                            :options="$jobTypeOptions"
                            placeholder="{{ __('job.type') }}">
                            <x-input-error class="mt-2"
                                for="state.type" />

                        </x-select>

                    </div>
                    {{-- title --}}
                    <div class="col-span-4">
                        <x-label for="title"
                            value="{{ __('job.title') }}" />
                        <x-input class="mt-1 block w-full max-w-lg dark:text-gray-50"
                            id="title"
                            type="text"
                            wire:model="state.title"
                            autocomplete="title"
                            placeholder="{{ __('job.title_example') }}" />
                        <x-input-error class="mt-2"
                            for="state.title" />
                    </div>
                    {{-- loction input --}}
                    <div class="col-span-6">
                        <x-label for="location"
                            value="{{ __('job.location') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="location"
                            type="text"
                            wire:model.defer="state.location"
                            autocomplete="location"
                            placeholder="{{ __('job.location_example') }}" />
                        <x-input-error class="mt-2"
                            for="state.location" />
                    </div>
                    {{-- description --}}
                    <div class="col-span-6">
                        <x-label for="description"
                            value="{{ __('job.description') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="description"
                            type="textarea"
                            rows="8"
                            wire:model.defer="state.description"
                            placeholder="{{ __('job.description_example') }}" />
                        <x-input-error class="mt-2"
                            for="state.description" />
                    </div>
                    <div class="col-span-6 mt-5">
                        <h2 class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-400">{{ __('Requirements') }}
                        </h2>
                    </div>
                    {{-- catagory selection --}}
                    <div class="col-span-3 max-w-md">
                        <x-label for="category"
                            value="{{ __('job.category') }}" />
                        <x-select class="mt-1 block w-full dark:text-gray-50"
                            id="category"
                            name="category"
                            wire:model.defer="state.category"
                            :options="$categoryOptions"
                            placeholder="{{ __('job.category') }}">
                            <x-input-error class="mt-2"
                                for="state.category" />
                        </x-select>
                    </div>
                    {{-- specializations --}}
                    <div class="col-span-3">
                        <x-label for="specializations"
                            value="{{ __('job.specializations') }}" />
                        <x-input class="mt-1 block w-full max-w-lg dark:text-gray-50"
                            id="specializations"
                            type="text"
                            wire:model="specializations"
                            autocomplete="specializations"
                            placeholder="{{ __('job.specializations_example') }}" />
                        <x-input-error class="mt-2"
                            for="specializations" />
                    </div>
                    {{-- requirements --}}
                    <div class="col-span-6">
                        <x-label for="requirements"
                            value="{{ __('job.extra_requirements') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="requirements"
                            type="text"
                            wire:model="requirements"
                            autocomplete="requirements"
                            placeholder="{{ __('job.extra_requirements_example') }}" />
                    </div>
                    <div class="col-span-3">
                        <x-label for="qualifications"
                            value="{{ __('job.qualifications') }}" />
                        <x-select class="mt-1 w-full px-10 dark:text-gray-50"
                            id="qualifications"
                            name="qualifications"
                            wire:model="qualifications"
                            :options="$qualificationOptions"
                            multiple />
                    </div>
                    <div class="col-span-3">
                        <x-label for="experience_years"
                            value="{{ __('job.experience_years') }}" />
                        @foreach ($experiencePerQualifications as $qualification => $experience)
                            <div class=" mt-1 grid w-full grid-cols-5 gap-2 items-center">
                                <x-label class="text-start col-span-2 col-start-1 text-lg sm:text-xl"
                                    for="qualification.{{ $qualification }}"
                                    value="{{ __($qualificationOptions[$qualification]) }}" />


                                <x-input class="col-span-3 dark:text-gray-50 col-start-3 text-center"
                                    id="experience.{{ $qualification }}"
                                    name="experience.{{ $qualification }}"
                                    type="number"
                                    wire:model="experiencePerQualifications.{{ $qualification }}" />
                            </div>
                        @endforeach

                    </div>

                    {{-- salary --}}
                    <div class="col-span-3 md:col-span-2 md:col-start-2">
                        <x-label for="salary"
                            value="{{ __('job.salary') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="salary"
                            type="number"
                            wire:model.defer="state.salary"
                            autocomplete="salary"
                            placeholder="10000" />
                        <x-input-error class="mt-2"
                            for="state.salary" />
                    </div>
                    {{-- number_of_positions --}}
                    <div class="col-span-3 md:col-span-2">
                        <x-label for="number_of_positions"
                            value="{{ __('job.number_of_positions') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="number_of_positions"
                            type="number"
                            wire:model.defer="state.number_of_positions"
                            autocomplete="number_of_positions"
                            placeholder="10" />
                        <x-input-error class="mt-2"
                            for="state.number_of_positions" />
                    </div>

                    {{-- start_date --}}
                    <div class="col-span-3 md:col-span-2 md:col-start-2">
                        <x-label for="start_date"
                            value="{{ __('job.start_date') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="start_date"
                            type="date"
                            wire:model.defer="state.start_date"
                            autocomplete="start_date"
                            placeholder="{{ __('job.start_date_example') }}" />
                        <x-input-error class="mt-2"
                            for="state.start_date" />
                    </div>

                    {{-- end_date --}}
                    <div class="col-span-3 md:col-span-2">
                        <x-label for="end_date"
                            value="{{ __('job.end_date') }}" />
                        <x-input class="mt-1 block w-full dark:text-gray-50"
                            id="end_date"
                            type="date"
                            wire:model.defer="state.end_date"
                            autocomplete="end_date"
                            placeholder="{{ __('job.end_date_example') }}" />
                        <x-input-error class="mt-2"
                            for="state.end_date" />
                    </div>
                    <x-input-error class="mt-2"
                        for="state.title" />
                    <x-input-error class="mt-2"
                        for="state.description" />
                    <x-input-error class="mt-2"
                        for="state.qualifications" />
                    <x-input-error class="mt-2"
                        for="state.specializations" />
                    <x-input-error class="mt-2"
                        for="state.experience_years_per_qualification" />
                    <x-input-error class="mt-2"
                        for="state.extra_requirements" />
                    <x-input-error class="mt-2"
                        for="state.start_date" />
                    <x-input-error class="mt-2"
                        for="state.end_date" />
                    <x-input-error class="mt-2"
                        for="state.salary" />
                    <x-input-error class="mt-2"
                        for="state.number_of_positions" />
                    <x-input-error class="mt-2"
                        for="state.location" />
                    <x-input-error class="mt-2"
                        for="state.type" />
                    <x-input-error class="mt-2"
                        for="state.category" />
                    <x-input-error class="mt-2"
                        for="qualifications" />
                    <x-input-error class="mt-2"
                        for="specializations" />

                </div>
            </div>
            <div
                class="flex items-center justify-end bg-gray-50 px-4 py-3 text-right shadow dark:bg-gray-800 sm:rounded-bl-md sm:rounded-br-md sm:px-6">
                <x-button class="ml-3"
                    wire:click="save">
                    {{ __('Save') }}
                </x-button>
            </div>

        </form>
    </div>
</div>
