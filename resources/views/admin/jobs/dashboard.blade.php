@php
    use Carbon\Carbon;
    $today_date = Carbon::now();
    // $jobs_end_in_days = [];
    // if(empty())
    // foreach ($jobs as $k => $job) {
    //     $start_date = Carbon::createFromFormat('Y-m-d', $job['start_date']);
    // }
    // $end_date = Carbon::createFromFormat('Y-m-d', $job['end_date']);
    
    // $jobs_end_in_days[$k] = $today_date->diffInDays($end_date, false);
    // if ($end_in_days > 0) {
    // } elseif ($end_in_days < 0) {
    //     $jobs_end_in_days[$k] = end_in_days
    // } else {
    //     //today
    // }
@endphp
<div>
    <x-datatable searchModel="search" :data="$jobs">
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

        <x-slot name="filters">

            <x-select class="px-7" wire:model="jobType" id="jobType" name="jobType" :options="$jobTypeOptions" />
            <x-select class="px-7" wire:model="qualification" id="qualification" name="qualification"
                :options="$qualificationOptions" />
            <x-select class="" wire:model="catagory" id="catagory" name="catagory" :options="$categoryOptions" />
            <div>
                <label class="label cursor-pointer p-0">
                    <x-checkbox class="checkbox-sm" wire:model="onlyActive" />
                    <span
                        class="label-text text-auto ms-2 text-gray-700 dark:text-gray-300">{{ __('Active only') }}</span>
                </label>
            </div>
        </x-slot>


        <x-slot name="thead">
            <x-datatable-th sortable=true field="title" title="{{ __('Title') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="type" title="{{ __('Type') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="category" title="{{ __('Category') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="location" title="{{ __('Location') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="start_date" title="{{ __('Start') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th sortable=true field="end_date" title="{{ __('End') }}" :sort-by="$sortBy"
                :sort-asc="$sortAsc" />
            <x-datatable-th field="" title="{{ __('Status') }}" />
            <x-datatable-th field="" title="" />
        </x-slot>


        <x-slot name="tbody">
            @foreach ($jobs as $k => $job)
                <x-datatable-tr iteration="{{ $loop->iteration }}">
                    <x-datatable-td :wrap=true>
                        <h2 class="mb-2 text-xl font-bold"><a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('admin.job.manage', ['id' => $job->id]) }}">{{ $job['title'] }}</a>
                            </h3>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        <span
                            class="indicator-item indicator-middle indicator-center badge badge-outline badge-primary dark:badge-outline dark:badge-secondary text-xs">
                            {{ $job['type'] ? __('job.' . str_replace('-', '_', $job['type'])) : '' }}
                        </span>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        <p>{{ $job['category'] ? __('job.' . str_replace('-', '_', $job['category'])) : '' }}</p>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        <p>{{ Str::limit($job['location'], 20) }}</p>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        <p>{{ $job['start_date'] }}</p>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        <p>{{ $job['end_date'] }}</p>
                    </x-datatable-td>
                    <x-datatable-td :wrap=true>
                        @if ($today_date->gte($job['start_date']) && $today_date->lte($job['end_date']))
                            <div class="flex-wrap items-center">
                                <span class=" badge badge-success text-xs">
                                    {{ __('Active') }}
                                </span>
                                <p>{{ __('remaining days') . ': ' . $today_date->diffInDays($job['end_date'], false) }}</p>
                            </div>
                        @elseif ($today_date->lte($job['start_date']))
                            <span class=" badge badge-warning text-xs">
                                {{ __('Scheduled') }}
                            </span>
                        @else
                            <span class="badge badge-error text-xs">
                                {{ __('Done') }}
                            </span>
                        @endif
                    </x-datatable-td>
                    <x-datatable-td :wrap=false>
                        <div class="flex me-1">
                            <div class="dropdown dropdown-right dropdown-hover ">
                                <label tabindex="0" class=""><svg class="w-6 h-6 text-gray-400" fill="none"
                                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
                                        </path>
                                    </svg></label>
                                <ul tabindex="0"
                                    class="dropdown-content rtl-dropdown-content-left menu p-2 shadow bg-gray-200 dark:bg-gray-600 rounded-box w-45 text-sm">
                                    <li><a wire:click="">
                                            {{ __('Action') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </x-datatable-td>
                </x-datatable-tr>
            @endforeach
        </x-slot>
    </x-datatable>

</div>
