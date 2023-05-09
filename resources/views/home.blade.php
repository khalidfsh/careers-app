<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl p-6 lg:p-8">
        <x-welcome />

        <x-section-border class="my-4" />

        <div class="">
            <h2 class="mt-4 text-start text-gray-900 dark:text-white text-3xl sm:tracking-tight lg:text-4xl">
                {{ __('الوظائف المتوفرة') }}
            </h2>
            <div class="mt-4 grid grid-cols-1 gap-6 md:grid-cols-3 lg:gap-8">
                @forelse($latestJobs as $job)
                    <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-3 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
                        href={{ route('jobs.show', ['job' => $job]) }}>
                        <div class="block w-full">
                            <div class="fixed top-2 end-2">
                                <div class="inline-flex items-center">
                                    <p class="text-sm text-violet-950 dark:text-emerald-700 text-opacity-80">
                                        {{ $job['end_date'] }}</p>
                                    <svg class="ms-1" width="29" height="29" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            class="stroke-black dark:stroke-gray-500 fill-violet-950 dark:fill-emerald-700"
                                            d="M14.5 26.5833C21.1734 26.5833 26.5833 21.1734 26.5833 14.5C26.5833 7.82652 21.1734 2.41663 14.5 2.41663C7.82656 2.41663 2.41667 7.82652 2.41667 14.5C2.41667 21.1734 7.82656 26.5833 14.5 26.5833Z"
                                            fill-opacity="0.28" stroke="black" stroke-opacity="0.28" stroke-width="2"
                                            stroke-linejoin="round" />
                                        <path d="M14.5051 7.24988L14.5043 14.5052L19.6273 19.6282" stroke="white"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>

                            <h2 class="mt-10 text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ $job['title'] }}
                            </h2>
                            <p class="ms-1 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('job.' . $job['category']) ?? '' }}
                            </p>
                            <div class="grid gap-1">
                                @if (!empty($job['location']))
                                    <div class="mt-4 inline-flex items-center">
                                        <svg class="text-violet-950 h-8 w-8 dark:text-emerald-700" fill="none"
                                            width="43" height="47" viewBox="0 0 43 47" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0H43V47H0V0Z" />
                                            <path class="stroke-black dark:stroke-gray-500"
                                                d="M8.83103 32.075C5.58876 33.1381 3.58337 34.6069 3.58337 36.2292C3.58337 39.4738 11.6049 42.1042 21.5 42.1042C31.3951 42.1042 39.4167 39.4738 39.4167 36.2292C39.4167 34.6069 37.4113 33.1381 34.169 32.075"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                class="stroke-black dark:stroke-gray-500 fill-violet-950 dark:fill-emerald-700"
                                                d="M21.5 34.2707C21.5 34.2707 33.1458 25.9517 33.1458 16.3341C33.1458 9.47606 27.9318 3.9165 21.5 3.9165C15.0682 3.9165 9.85418 9.47606 9.85418 16.3341C9.85418 25.9517 21.5 34.2707 21.5 34.2707Z"
                                                fill-opacity="0.28" stroke-width="2" stroke-linejoin="round" />
                                            <path
                                                d="M21.5 21.5417C23.9738 21.5417 25.9792 19.3497 25.9792 16.6458C25.9792 13.942 23.9738 11.75 21.5 11.75C19.0262 11.75 17.0208 13.942 17.0208 16.6458C17.0208 19.3497 19.0262 21.5417 21.5 21.5417Z"
                                                fill="#24315B" stroke="white" stroke-width="2"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <p class="ms-1 text-md text-gray-800 dark:text-gray-400">{{ $job['location'] }}
                                        </p>
                                    </div>
                                @endif
                                @if (!empty($job['type']))
                                    <div class="inline-flex items-center ">
                                        <svg class=" h-8 w-8 text-violet-950 dark:text-emerald-700 stroke-black dark:stroke-gray-500"
                                            width="45" height="41" viewBox="0 0 45 41" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M39.6698 15.7638L42.944 34.2638C43.3848 36.7542 41.1681 39.0001 38.2697 39.0001H6.7304C3.83183 39.0001 1.61526 36.7542 2.05601 34.2638L5.33019 15.7638C5.68515 13.7583 7.67032 12.2778 10.0046 12.2778H34.9955C37.3297 12.2778 39.3149 13.7583 39.6698 15.7638Z"
                                                stroke-width="2.76" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M27.2294 6.11111C27.2294 3.84061 25.1121 2 22.5 2C19.888 2 17.7707 3.84061 17.7707 6.11111"
                                                stroke-width="2.76" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="ms-1 text-md text-gray-800 dark:text-gray-400">
                                            {{ __('job.' . $job['type']) }}</p>

                                    </div>
                                @endif

                            </div>
                            <div class="flex justify-end">
                                <div class="btn btn-md btn-outline btn-secondary glass shadow-md rounded-full px-8 py-2 text-sm font-semibold text-gray-900 dark:text-white"
                                    {{-- onclick="window.location.href='{{ route('apply') }}'" --}}>{{ __('Apply now') }}
                                </div>
                            </div>

                        </div>
                    </a>
                @empty
                    <h3 class="mb-4 text-lg p-4 font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('job.no_jobs') }}
                    </h3>
                @endforelse
            </div>
        </div>
    </div>


</x-app-layout>
