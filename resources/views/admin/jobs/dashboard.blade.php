<div>
    <x-list-view searchModel="search"
        :data="$jobs">
        {{-- <x-slot name="filters">
        </x-slot> --}}

        <x-slot name="data">
            @forelse($jobs as $job)
                <li class="mx-5">
                    {{-- <div class="mb-4 rounded-lg bg-white p-4 shadow-md dark:bg-gray-800">
                        <h3 class="mb-2 text-lg font-semibold">
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('job', $job) }}">{{ $job->title }}</a>
                        </h3>
                        <p>{{ Str::limit($job->description, 150) }}</p>
                    </div> --}}
                    <div class="pt-4 sm:p-6">
                        <h3 class="mb-2 text-2xl font-bold"><a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('admin.job.manage', ['id' => $job->id]) }}">{{ $job['title'] }}</a></h3>
                        <p class="dark:text-white">{{ Str::limit($job->description, 150) }}</p>
                        <div class="grid grid-cols-2 gap-4 dark:text-white">
                            <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.location') }}:</strong>
                                {{ $job['location'] ?? '' }}</p>
                            <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.type') }}:</strong>
                                {{ $job['type'] ? __('job.' . str_replace('-', '_', $job['type'])) : '' }}
                            </p>
                            <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.category') }}:</strong>
                                {{ __('job.' . $job['category']) ?? '' }}</p>
                            <p><strong class="text-gray-700 dark:text-gray-400">{{ __('job.start_date') }}:</strong>
                                {{ $job['start_date'] }}</p>
                        </div>
                    </div>
                </li>
            @empty
                <h3 class="mb-4text-lg mb-2 p-4 font-semibold text-gray-600 dark:text-gray-400">
                    {{ __('job.no_jobs') }}
                </h3>
            @endforelse
        </x-slot>
    </x-list-view>

</div>
