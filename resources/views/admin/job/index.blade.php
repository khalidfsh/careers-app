<x-app-layout>
    <x-slot name="header">
        <x-section-title>
            <x-slot name="title">
                @if ($isNew)
                    {{ __('job.new_announcement') }}
                @else
                    {{ __('job.edit_announcement') }}
                @endif
            </x-slot>
            <x-slot name="description">{{ __('job.manage_announcement_description') }}</x-slot>
            {{-- <x-slot name="actions">
                <a class="btn btn-primary text-xm text-red-500 hover:text-red-700"
                    wire:click="clearFields">
                    {{ __('Clear Fields') }}
                </a>
            </x-slot> --}}
        </x-section-title>
    
    </x-slot>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire('admin.job-manage', ['jobId' => $jobId])
        </div>
    </div>
</x-app-layout>
