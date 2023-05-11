<div class="py-6">
    <x-action-section>
        <x-slot name="title">
            {{ __('resume.skill_name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('resume.skill_description') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <div class="relative overflow-x-auto">
                    <div class="w-full space-y-3">
                        <div class="inline-flex w-full px-1 pb-3 text-start">
                            <x-input class="block w-full dark:text-gray-50" id="skill" type="text"
                                wire:model.defer="skill" placeholder="{{ __('resume.skill_place_holder') }}" />
                            <button class="btn btn-square btn-ghost" wire:click='addSkill'>
                                <svg class="w-10 stroke-violet-700 dark:stroke-emerald-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                                </svg>
                            </button>
                        </div>
                        <x-input-error class="mt-2" for="skill" />
                        @foreach ($skills as $index => $skill)
                            <div class="border-violet-950 border-b-2 dark:border-emerald-700">
                                <div class="flex justify-between items-center">
                                    <div class="px-1 py-1 text-start" scope="row">
                                        <p class="text-md text-gray-900 dark:text-gray-100">
                                            {{ $skill }}</p>
                                    </div>
                                    <button class="me-2 btn btn-square btn-ghost"
                                        wire:click='removeSkill({{ $index }})'>
                                        <svg class="w-6 stroke-red-700 dark:stroke-red-600" fill="none"
                                            stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="divider pt-10 ">{{ __('Languages') }}</div>
                <div class="relative overflow-x-auto">
                    <div class="w-full space-y-3">
                        <div class="inline-flex w-full px-1 pb-3 text-start">
                            <x-select class="mt-1 block w-full dark:text-gray-50" id="language" name="language"
                                wire:model.defer="language" :options="$languageOptions">
                            </x-select>
                            <x-select class="mt-1 block w-full dark:text-gray-50" id="languageLevel"
                                name="languageLevel" wire:model.defer="languageLevel" :options="$languageLevelOptions">
                            </x-select>

                            <button class="btn btn-square btn-ghost" wire:click='addLanguage'>
                                <svg class="w-10 stroke-violet-700 dark:stroke-emerald-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                                </svg>
                            </button>
                        </div>
                        {{-- <x-input-error class="mt-2"
                            for="language" /> --}}

                        @foreach ($languages as $language => $level)
                            <div class="border-violet-950 border-b-2 dark:border-emerald-700">
                                <div class="flex justify-between items-center">
                                    <div class="px-1 py-1">
                                        <p class="text-md text-gray-900 dark:text-gray-100">
                                            {{ __('language.' . $language) }}</p>
                                    </div>
                                    <div class="px-1 py-1">
                                        <p class="text-md text-gray-900 dark:text-gray-100">
                                            {{ __($languageLevelOptions[$level]) }}</p>
                                    </div>
                                    <button class="me-2 btn btn-square btn-ghost"
                                        wire:click='removeLanguage("{{ $language }}")'>
                                        <svg class="w-6 stroke-red-700 dark:stroke-red-600" fill="none"
                                            stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-slot>
    </x-action-section>
</div>
