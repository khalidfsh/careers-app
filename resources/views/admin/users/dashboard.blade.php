<div>
    <x-datatable searchModel="search" :data="$users">
        <x-slot name="actions">
            <x-button class="disabled" wire:click="">
                {{ __('Export') }}
            </x-button>
        </x-slot>
        {{-- <x-slot name="filters">
        </x-slot> --}}
        <x-slot name="filters">

            <div class="btn-group grow max-w-md">
                <x-select class="" wire:model="catagory" id="catagory" name="catagory" :options="$categoryOptions" />
                @if ($jobs->count() > 0)
                    <x-select class="w-full" wire:model="jobId" id="job" name="job" :options="$jobs" />
                @endif

            </div>

            <div class="btn-group grow max-w-md justify-center gap-2">

                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-md" wire:model="" />
                        <span class="label-text text-base ms-1 text-gray-700 dark:text-gray-300">{{ __('Only active') }}</span>
                    </label>
                </div>
                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-md" wire:model="" />
                        <span class="label-text text-base ms-1 text-gray-700 dark:text-gray-300">{{ __('Only admin') }}</span>
                    </label>
                </div>
                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-md" wire:model="" />
                        <span class="label-text text-base ms-1 text-gray-700 dark:text-gray-300">{{ __('Has resume') }}</span>
                    </label>
                </div>
            </div>
        </x-slot>

        <x-slot name="thead">
            <x-datatable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="email" title="{{ __('Email') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th field="resume" title="{{ __('Resume') }}" />
        </x-slot>

        <x-slot name="tbody">
            @foreach ($users as $user)
                <x-datatable-tr iteration="{{ $loop->iteration }}">
                    <x-datatable-td :wrap=false>
                        <div class="flex items-center gap-2">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                class="h-12 w-12 mask mask-squircle object-cover" />
                            <div class="text-lg text-gray-800 dark:text-gray-100">
                                {{ $user->name }} {{ $user->last_name }}
                            </div>
                            @if ($user->is_admin)
                                <span
                                    class="indicator-item indicator-middle indicator-center badge badge-primary text-xs">{{ __('Admin') }}</span>
                            @endif
                    </x-datatable-td>
                    <x-datatable-td>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </x-datatable-td>
                    <x-datatable-td>
                        {{-- @if ($user->resume) --}}
                        <a href="{{ $user->resume }}" target="_blank" class="">
                            <svg class="w-6 h-6 "fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </a>

                        {{-- @endif --}}
                    </x-datatable-td>
                </x-datatable-tr>
            @endforeach
        </x-slot>
    </x-datatable>
</div>
