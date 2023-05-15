<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="text-md breadcrumbs">
                <ul>
                    <li><a href="{{ route('jobs') }}">
                        {{ __('Jobs') }}
                    </a>
                </li>
                  <li>{{ $job['title'] }}</li> 
                </ul>
            </div>

            {{-- TODO: apply page --}}
            <div class="flex justify-end">
                <div class="btn btn-md btn-outline btn-secondary glass shadow-md rounded-full px-8 py-2 text-sm font-semibold text-gray-900 dark:text-white"
                    {{-- onclick="window.location.href='{{ route('apply') }}'" --}}>{{ __('Apply now') }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 pt-4 dark:text-white">
        <div class="bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">
            <div class="flex justify-between">
                <h2 class="mb-2 text-2xl font-bold text-gray-600 dark:text-gray-500">{{ __('job.description') }}</h2>
                @if (!empty($job['type']))
                    <p class="font-black text-gray-900 dark:text-gray-200">{{ __('job.' . $job['type']) }}</p>
                @endif
            </div>

            <p class="font-base text-gray-900 dark:text-gray-200">{!! nl2br(e($job['description'])) !!}</p>
        </div>

        <div class="mt-4 bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">
            <h2 class="mb-2 text-xl font-bold text-gray-600 dark:text-gray-500">{{ __('job.details') }}</h2>
            <div class="mb-2 grid grid-cols-2 gap-4">
                @if (!empty($job['category']))
                <p class="text-black dark:text-white"><strong class="text-gray-700 dark:text-gray-400">{{ __('job.department') }}:</strong>
                    {{ __('job.'.$job['category']) ?? '' }}</p>
                @endif
                @if (!empty($job['location']))
                <p class="text-black dark:text-white"><strong class="text-gray-700 dark:text-gray-400">{{ __('job.location') }}:</strong>
                    {{ $job['location'] ?? '' }}</p>
                @endif
                @if (!empty($job['salary']))
                <p class="text-black dark:text-white"><strong class="text-gray-700 dark:text-gray-400">{{ __('job.salary') }}:</strong>
                    {{ $job['salary'] ? '~ ' . $job['salary'] . ' ' . __('SAR')  : '' }}</p>
                @endif
                @if (!empty($job['number_of_positions']))
                <p class="text-black dark:text-white"><strong class="text-gray-700 dark:text-gray-400">{{ __('job.number_of_positions') }}:</strong>
                    {{ $job['number_of_positions'] ?? '' }}</p>
                @endif
                {{-- <p class="text-gray-700 dark:text-gray-400"><strong>{{ __('job.start_date') }}:</strong>
                    {{ $job['start_date'] }}</p>
                <p class="text-gray-700 dark:text-gray-400"><strong>{{ __('job.end_date') }}:</strong>
                    {{ $job['end_date'] }}</p> --}}
                
            </div>
            <div class="text-gray-700 dark:text-gray-400" x-data="countdown('{{ $job['end_date'] }}')" x-init="init()">
                <strong>{{ __('Remaining time') }}:</strong>
                <div class="flex gap-5 start-10">
                    <div>
                        <span class="font-mono text-xl text-black dark:text-white" x-text="days"></span>
                        {{ __('days') }}
                    </div>
                    <div>
                        <span class="font-mono text-xl text-black dark:text-white" x-text="hours"></span>
                        {{ __('hours') }}
                    </div>
                    <div>
                        <span class="font-mono text-xl text-black dark:text-white" x-text="minutes"></span>
                        {{ __('min') }}
                    </div>
                    <div>
                        <span class="font-mono text-xl text-black dark:text-white" x-text="seconds"></span>
                        {{ __('sec') }}
                    </div>
                </div>
            </div>
            
        </div>


        <div class="mt-4 bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">

            <h2 class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-400">{{ __('job.extra_requirements') }}
            </h2>
            <h3 class="mb-2 text-md text-gray-700 dark:text-gray-400">
                {{ __('job.qualifications') }} {{ __('And') }} {{ __('job.experience_years') }}
            </h3>

            <!-- Qualifications -->

            <ul class="mb-2 list-disc px-8 text-black dark:text-white">
                @if ($qualifications)
                    @foreach ($qualifications as $qualification)
                        <li>{{ __('resume.qualification.types.' . $qualification) }}
                            @if ($experiencePerQualifications[$qualification] == 0)
                                ({{ __('None') }}
                            @elseif ($experiencePerQualifications[$qualification] == 1)
                                ({{ __('year') }}
                            @elseif ($experiencePerQualifications[$qualification] == 2)
                                ({{ __('2 years') }}
                            @else
                                ({{ $experiencePerQualifications[$qualification] }}
                                {{ __('years') }}
                            @endif
                            {{ __('experience') }})

                        </li>
                    @endforeach
                @else
                    <li> {{ __('None') }}</li>
                @endif

            </ul>
            <!-- Specializations -->
            <h3 class="mt-2 mb-2 text-md text-gray-700 dark:text-gray-400">{{ __('job.specializations') }}</h3>
            <ul class="list-disc px-8 text-black dark:text-white">
                @if (!empty($specializations))
                    @foreach ($specializations as $specialization)
                        <li>{{ ucfirst($specialization) }}</li>
                    @endforeach
                @else
                    <li> {{ __('None') }}</li>
                @endif

            </ul>

            <h3 class="mt-2 mb-2 text-md text-gray-700 dark:text-gray-400">{{ __('job.extra_requirements') }} </h3>
            <!-- Extra Requirements -->
            <ul class="mb-8 list-disc px-8 text-black dark:text-white">
                @if (!empty($requirements))

                    @foreach ($requirements as $requirement)
                        <li>{{ ucfirst($requirement) }}</li>
                    @endforeach
                @else
                    <li> {{ __('None') }}</li>
                @endif


            </ul>
            {{-- TODO: apply page --}}
            <div class="justify-center flex">
                <div class="btn btn-wide btn-outline btn-secondary glass shadow-md rounded-full text-lg font-semibold text-gray-900 dark:text-white"
                        {{-- onclick="window.location.href='{{ route('apply') }}'" --}}>{{ __('Apply now') }}
                </div>
            </div>
        </div>


    </div>
</x-app-layout>

<script>
    function countdown(endDate) {
        return {
            days: 0,
            hours: 0,
            minutes: 0,
            seconds: 0,
            init() {
                this.calculateCountdown(endDate);
                setInterval(() => {
                    this.calculateCountdown(endDate);
                }, 1000);
            },
            calculateCountdown(endDate) {
                const now = new Date();
                const targetDate = new Date(endDate);
                const remainingTime = targetDate - now;

                if (remainingTime > 0) {
                    this.days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                    this.hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    this.minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                    this.seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
                } else {
                    this.days = 0;
                    this.hours = 0;
                    this.minutes = 0;
                    this.seconds = 0;
                }
            },
        };
    }
</script>