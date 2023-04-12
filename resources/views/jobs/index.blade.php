<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
                <div class="bg-white dark:bg-gray-800 p-4 mb-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="{{ route('job', $job) }}" class="text-blue-500 hover:text-blue-700">{{ $job->title }}</a>
                    </h3>
                    <p>{{ Str::limit($job->description, 150) }}</p>
                </div>
            @endforeach

            {{ $jobs->links() }}
        </div>
    </div>
</x-app-layout>