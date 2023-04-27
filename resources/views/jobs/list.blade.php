<div>
    <x-list-view searchModel="search" :data="$jobs">
        {{-- <x-slot name="filters">
    </x-slot> --}}

        <x-slot name="data">
            <div>
                @forelse($jobs as $job)
                    <div class="card card-compact rounded-none w-auto shadow-sm dark:shadow-md mt-2">
                        <div class="card-body">
                            <h2 class="card-title inline-flex">
                                <a class="text-blue-500 text-2xl" href="{{ route('jobs.show', ['job' => $job]) }}">
                                    {{ $job['title'] }}
                                    
                                </a>
                                <div class="badge badge-sm badge-secondary">{{ __('NEW') }}</div>

                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('job.' . $job['category']) ?? '' }}
                            </p>
                            <div class="px-1 py-1">
                                <p class="text-gray-900 text-base dark:text-white">{!! nl2br(e(Str::limit($job['description'], 160))) !!}</p>
                            </div>

                            <div class="card-actions flex justify-between">
                                <div class="inline-flex">
                                    @if (!empty($job['number_of_positions']))
                                        <div class="badge badge-outline me-1">

                                            <svg class="h-4 w-4 dark:text-emerald-700" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                            <p class="text-sm ps-2">{{ $job['number_of_positions'] }} </p>
                                        </div>
                                    @endif
                                    @if (!empty($job['type']))
                                        <div class="badge badge-outline">
                                            <p class="text-sm">{{ __('job.' . $job['type']) }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="">
                                    @if (!empty($job['location']))
                                        <div class="inline-flex">
                                            <svg class="text-violet-950 h-4 w-4 dark:text-emerald-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <p class="text-sm ps-1"> {{ $job['location'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="divider"></div>  --}}
                @empty
                    <h3 class="mb-4 text-lg p-4 font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('job.no_jobs') }}
                    </h3>
                @endforelse
                <div class="ps-2">
                    {{ $jobs->links() }}
                </div>
            </div>
        </x-slot>
    </x-list-view>
</div>
