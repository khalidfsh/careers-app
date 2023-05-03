<div>
    <x-datatable searchModel="search" :data="$users">
        <x-slot name="actions">
            <x-button class="gap-2" wire:click="">
                {{ __('Export') }}
                <div class="text-gray-100 dark:text-gray-800">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"
                        height="24px">
                        <path
                            d="M 14 3 L 2 5 L 2 19 L 14 21 L 14 19 L 21 19 C 21.552 19 22 18.552 22 18 L 22 6 C 22 5.448 21.552 5 21 5 L 14 5 L 14 3 z M 12 5.3613281 L 12 18.638672 L 4 17.306641 L 4 6.6933594 L 12 5.3613281 z M 14 7 L 16 7 L 16 9 L 14 9 L 14 7 z M 18 7 L 20 7 L 20 9 L 18 9 L 18 7 z M 5.1757812 8.296875 L 7.0605469 11.994141 L 5 15.703125 L 6.7363281 15.703125 L 7.859375 13.308594 C 7.934375 13.079594 7.9847656 12.908922 8.0097656 12.794922 L 8.0253906 12.794922 C 8.0663906 13.032922 8.1162031 13.202109 8.1582031 13.287109 L 9.2714844 15.701172 L 11 15.701172 L 9.0058594 11.966797 L 10.943359 8.296875 L 9.3222656 8.296875 L 8.2929688 10.494141 C 8.1929688 10.779141 8.1257969 10.998625 8.0917969 11.140625 L 8.0664062 11.140625 C 8.0084063 10.902625 7.9509531 10.692719 7.8769531 10.511719 L 6.953125 8.296875 L 5.1757812 8.296875 z M 14 11 L 16 11 L 16 13 L 14 13 L 14 11 z M 18 11 L 20 11 L 20 13 L 18 13 L 18 11 z M 14 15 L 16 15 L 16 17 L 14 17 L 14 15 z M 18 15 L 20 15 L 20 17 L 18 17 L 18 15 z" />
                    </svg>
                </div>
            </x-button>
        </x-slot>
        {{-- <x-slot name="filters">
        </x-slot> --}}
        <x-slot name="filters">

            <div class="btn-group grow max-w-md">
                <x-select class="w-full" wire:model="catagory" id="catagory" name="catagory" :options="$categoryOptions" />
                @if ($jobs->count() > 0)
                    <x-select class="w-full" wire:model="jobId" id="job" name="job" :options="$jobs" />
                @endif

            </div>
            <div class="divider divider-horizontal"></div>
            <div class="flex-wrap btn-group grow max-w-md justify-center whitespace-nowrap">
                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-sm" wire:model="onlyStaff" />
                        <span
                            class="label-text text-auto ms-2 text-gray-700 dark:text-gray-300">{{ __('Staff only') }}</span>
                    </label>
                </div>
                <div class="divider divider-horizontal mx-0"></div>
                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-sm" wire:model="onlyActive" />
                        <span
                            class="label-text text-auto ms-2 text-gray-700 dark:text-gray-300">{{ __('Active users') }}</span>
                    </label>
                </div>
                <div>
                    <label class="label cursor-pointer">
                        <x-checkbox class="checkbox-sm" wire:model="" />
                        <span
                            class="label-text text-auto ms-2 text-gray-700 dark:text-gray-300">{{ __('Has resume') }}</span>
                    </label>
                </div>
            </div>
        </x-slot>

        <x-slot name="thead">
            <x-datatable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="email" title="{{ __('Email') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th field="resume" title="{{ __('Manage') }}" />
        </x-slot>

        <x-slot name="tbody">
            @foreach ($users as $user)
                <x-datatable-tr iteration="{{ $loop->iteration }}">
                    <x-datatable-td :wrap=false>
                        <div class="flex items-center gap-1">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                class="h-14 w-14 mask mask-squircle object-cover" />
                            <div class="flex-wrap ">
                                <div class="text-auto text-gray-800 dark:text-gray-100">
                                    {{ $user->name }} {{ $user->last_name }}
                                </div>
                                @if ($user->role_id > 1)
                                    <span
                                        class="indicator-item indicator-middle indicator-center badge badge-outline badge-primary dark:badge-outline dark:badge-secondary text-xs">{{ $user->role_id == 9 ? __('Owner') : ($user->isAdmin() ? __('Admin') : __('Viewer')) }}</span>
                                @endif
                            </div>
                        </div>
                    </x-datatable-td>
                    <x-datatable-td>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </x-datatable-td>
                    <x-datatable-td>

                        <div class="inline-flex gap-1 me-1">
                            {{-- @if ($user->resume) --}}
                            <a href="{{ $user->resume }}" target="_blank" class="">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </a>
                            {{-- @endif --}}
                            <div class="flex ">
                                <div class="dropdown dropdown-right dropdown-hover relative hover:absolute">
                                    <label tabindex="0" class=""><svg class="w-6 h-6 text-gray-400"
                                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
                                            </path>
                                        </svg></label>
                                    <ul tabindex="0"
                                        class="dropdown-content rtl-dropdown-content-left menu p-2 shadow bg-gray-200 dark:bg-gray-600 rounded-box w-45 text-sm">
                                        <li><a
                                                wire:click="assignAdminRole({{ $user->id }})">{{ __('Assigning admin role') }}</a>
                                        </li>
                                        <li><a
                                                wire:click="assignViewerRole({{ $user->id }})">{{ __('Assign viewer role') }}</a>
                                        </li>
                                        <li><a
                                            wire:click="clearRole({{ $user->id }})">{{ __('Clear user role') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </x-datatable-td>
                </x-datatable-tr>
            @endforeach
        </x-slot>
    </x-datatable>
</div>
