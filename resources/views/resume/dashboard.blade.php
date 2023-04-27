<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <div class="flex flex-col">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('resume.resume') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('resume.resume_description') }}</p>
            </div>
                <a class="btn  btn-outline btn-primary dark:btn-secondary dark:btn-outline"
                    href="#">{{ __('resume.upload') }}</a>
        </div>
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
        <div calss="me-2">
            <a href="#" class="btn btn-primary">{{ __('resume.upload') }}</a>
        </div> --}}
    </x-slot>

    <div>
        <div class="mx-auto max-w-7xl py-10 sm:px-6 lg:px-8">
            @livewire('resume.general-form')
            <x-section-border />
            @livewire('resume.qualification')
        </div>
    </div>
</x-app-layout>
