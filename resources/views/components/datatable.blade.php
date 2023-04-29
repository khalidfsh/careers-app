@props(['filters' => '', 'actions' => '', 'thead' => '', 'tbody' => '', 'data' => '', 'searchModel' => ''])

<div class="mb-5">
    @if (session()->has('flash.banner'))
        <x-banner style="{{ session('flash.bannerStyle') }}" message="{{ session('flash.banner') }}" />
    @endif
</div>

@if ($searchModel != '' || $actions != '')
    <div class="mb-2 mx-2 flex flex-col justify-between gap-3 md:flex-row">
        @if ($searchModel != '')
            <div class="relative order-2 rounded-md shadow-sm md:order-1">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <span class="text-gray-500 sm:text-sm">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <x-input
                    class="block w-full rounded-md ps-10 pe-12 focus:border-violet-950 focus:ring-violet-950 sm:text-sm"
                    id="search-{{ $searchModel }}" name="search-{{ $searchModel }}" type="text"
                    wire:model.debounce.500ms="{{ $searchModel }}" placeholder="{{ __('Search') }}" />

            </div>
        @endif
        <div class="order-1 md:order-2">
            <div>
                {{ $actions }}
            </div>
        </div>
    </div>
@endif

@if ($filters != '')
    <div class="mb-5 mx-4">
        <x-label class="text-xl text-gray-500" for="filters">{{ __('Filters') }}</x-label>
        <div id="filters" name="filters" class="">
            <div class="flex flex-wrap items-center gap-3">
                {{ $filters }}
            </div>
        </div>
    </div>
@endif

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 dark:border-gray-600 shadow sm:rounded-lg">

                <table class="table-striped w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-200 dark:bg-gray-600 text-gray-50">
                        <tr>
                            {{ $thead }}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-900">
                        {{ $tbody }}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@if ($data != '')
    <div class="mt-4">
        {{ $data->links() }}
    </div>
@endif
