<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('job.job_listings') }}
            </h2>

            {{-- locate link to the end of view --}}


            <x-nav-link class="text-gl justify-end font-semibold leading-tight text-gray-800 dark:text-gray-200"
                :href="route('admin.job')">
                {{ __('job.create') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin.jobs')
            </div>
        </div>
    </div>
</x-app-layout>
