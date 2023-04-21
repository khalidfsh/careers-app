<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                <x-nav-link class="justify-end text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                    href="#">
                    {{ __('Jobs') }}
                </x-nav-link> / {{ $job['title'] }}
            </h2>
            {{-- TODO: apply page --}}
            <x-nav-link class="justify-end text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                href="#">
                {{ __('job.apply') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 pt-4 dark:text-white">
        <div class="bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">
            <div class="flex justify-between">
                <h2 class="mb-2 text-2xl font-bold text-gray-700 dark:text-gray-400">{{ __('job.description') }}</h2>
                @if (!empty($job['type']))
                    <p><strong>{{ __('job.' . $job['type']) }}</strong></p>
                @endif

            </div>
            <p class="mb-8">{!! nl2br(e($job['description'])) !!}</p>
        </div>

        <div class="mt-4 bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">
            <div class="mb-8 grid grid-cols-2 gap-4">
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.location') }}:</strong>
                    {{ $job['location'] ?? '' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.department') }}:</strong>
                    {{ $job['category'] ?? '' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.salary') }}:</strong>
                    {{ $job['salary'] ? '$' . $job['salary'] : '' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.number_of_positions') }}:</strong>
                    {{ $job['number_of_positions'] ?? '' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.start_date') }}:</strong>
                    {{ $job['start_date'] }}</p>
                <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.end_date') }}:</strong>
                    {{ $job['end_date'] }}</p>
            </div>
        </div>


        <div class="mt-4 bg-white px-4 py-5 shadow dark:bg-gray-800 sm:rounded-md sm:p-6">

            <h2 class="mb-2 text-2xl font-bold text-gray-700 dark:text-gray-400">{{ __('job.extra_requirements') }}
            </h2>
            <h3 class="mb-2 text-xl text-gray-700 dark:text-gray-400">
                {{ __('job.qualifications') }} {{ __('And') }} {{ __('job.experience_years') }}
            </h3>

            <!-- Qualifications -->

            <ul class="mb-2 list-disc px-8">
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
            {{-- <h3 class="mb-2 text-xl text-gray-700 dark:text-gray-400">{{ __('job.specializations') }}</h3>
            <ul class="list-disc px-8">
                @if ($job['specializations'])
                    @foreach ($job['specializations'] as $specialization)
                        <li>{{ ucfirst($specialization) }}</li>
                    @endforeach
                @else
                    <li> {{ __('None') }}</li>
                @endif

            </ul> --}}

            <h3 class="mb-2 text-xl text-gray-700 dark:text-gray-400">{{ __('job.extra_requirements') }} </h3>
            <!-- Extra Requirements -->
            <ul class="mb-8 list-disc px-8">
                @if (!empty($job['extra_requirements']))

                    @foreach ($job['extra_requirements'] as $requirement)
                        <li>{{ ucfirst($requirement) }}</li>
                    @endforeach
                @else
                    <li> {{ __('None') }}</li>
                @endif


            </ul>
        </div>

    </div>
</x-app-layout>
