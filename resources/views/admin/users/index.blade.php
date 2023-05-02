<x-app-layout>
    {{-- <div class="mb-5">
        @if( session()->has('flash.banner') )
            <x-banner style="{{ session('flash.bannerStyle') }}" message="{{ session('flash.banner') }}" />
        @endif
    </div> --}}

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Job Seekers') }}
            </h2>
            {{-- <x-nav-link class="text-gl justify-end font-semibold leading-tight text-gray-800 dark:text-gray-200"
                :href="#">
                {{ __('') }}
            </x-nav-link> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin.users')
            </div>
        </div>
    </div>
</x-app-layout>
