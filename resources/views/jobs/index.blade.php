<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('job.job_listings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div>
            {{-- <a href="{{ route('admin.jobs') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('job.create_job') }}
            </a> --}}
        </div>

        <div class="mt-8">
            @foreach ($jobs as $job)
                <div class="mb-4 rounded-lg bg-white p-4 shadow-md dark:bg-gray-800">
                    <div class="flex justify-between">
                        <h3 class="mb-2 text-lg font-semibold">
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
                        </h3>
                        @if (!empty($job['type']))
                            <p><strong>{{ __('job.' . $job['type']) }}</strong></p>
                        @endif

                    </div>
                    <p class="dark:text-white">{{ Str::limit($job->description, 150) }}</p>
                </div>
            @endforeach

            {{ $jobs->links() }}
        </div>
    </div>
</x-app-layout>
