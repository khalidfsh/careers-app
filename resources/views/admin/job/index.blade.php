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
            <x-slot name="actions">
                <button class="btn btn-primary text-xm text-red-500 hover:text-red-700"
                    wire:click="clearFields">{{ __('Clear Fields') }}
                </button>
            </x-slot>
        </x-section-title>
    
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin.job-manage', ['isNew' => $isNew, 'state' => $job])
            </div>
        </div>
    </div>
</x-app-layout>
