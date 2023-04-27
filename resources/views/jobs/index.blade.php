<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('job.job_listings') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl ">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('jobs')
            </div>
        </div>
    </div>
{{-- 
    <div class="container mx-auto mt-8">

        <div class="mt-8">
            @foreach ($jobs as $job)
                <div class="mb-4 rounded-lg bg-white p-4 shadow-md dark:bg-gray-800">
                    <div class="flex justify-between">
                        <div class="flex flex-col items-start text-gray-500">
                            <h3 class="text-lg font-semibold">
                                <a class="text-blue-500 hover:text-blue-700"
                                    href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
                            </h3>
                            <p class="text-sm">
                                {{ __('job.' . $job['category']) ?? '' }}
                            </p>
                        </div>
                        <div class="flex flex-col items-end text-gray-500">
                            @if (!empty($job['number_of_positions']))
                                <div class="inline-flex">

                                    <svg class="text-violet-950 h-4 w-4 dark:text-emerald-700"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9"
                                            cy="7"
                                            r="4" />
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    <p class="text-sm ps-1">{{ $job['number_of_positions'] }} </p>
                                </div>
                            @endif
                            @if (!empty($job['type']))
                                <p class="text-sm">{{ __('job.' . $job['type']) }}</p>
                            @endif
                            @if (!empty($job['location']))
                                <div class="inline-flex">
                                    <svg class="text-violet-950 h-4 w-4 dark:text-emerald-700"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p class="text-sm ps-1"> {{ $job['location'] }}</p>
                                </div>
                            @endif

                        </div>




                    </div>
                    <div class="pt-2">
                        <p class="dark:text-white">{{ Str::limit($job->description, 150) }}</p>
                    </div>
                </div>
            @endforeach

            {{ $jobs->links() }}
        </div>
    </div> --}}
</x-app-layout>
