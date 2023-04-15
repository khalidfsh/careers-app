<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('job.job_details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div class="bg-white p-4 dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold">{{ $job->title }}</h3>

            <p>{{ $job->description }}</p>
            <p class="text-sm text-gray-600">{{ __('job.description') }}: {{ Str::limit($job->description, 150) }}</p>
            <p class="text-sm text-gray-600">{{ __('job.number_of_positions') }}: {{ $job->number_of_positions }}</p>
            <p class="text-sm text-gray-600">{{ __('job.qualification') }}: {{ $job->qualification }}</p>
            {{-- <p class="text-sm text-gray-600">{{ __('job.required_specializations') }}: {{ implode(', ', $job->required_specializations) }}</p> --}}
            <p class="text-sm text-gray-600">{{ __('job.required_specializations') }}:
                {{ $job->required_specializations }}</p>
            <p class="text-sm text-gray-600">{{ __('job.required_experience_years') }}:
                {{ $job->required_experience_years }}</p>
            {{-- <p class="text-sm text-gray-600">{{ __('job.requirements') }}: {{ implode(', ', $job->requirements) }}</p> --}}
            <p class="text-sm text-gray-600">{{ __('job.requirements') }}: {{ $job->requirements }}</p>
        </div>

        {{-- <div class="mt-4">
            <a href="{{ route('admin.jobs', ['state' => $job]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('job.update_job') }}
            </a>
        </div> --}}
    </div>
</x-app-layout>
