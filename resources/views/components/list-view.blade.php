@props(['filters' => '', 'actions' => '', 'data' => '', 'searchModel' => ''])
{{-- <div class="mb-5">
    @if (session()->has('flash.banner'))
        <x-banner style="{{ session('flash.bannerStyle') }}"
            message="{{ session('flash.banner') }}" />
    @endif
</div> --}}

@if ($searchModel != '' || $actions != '')
    <div class="flex flex-col justify-between gap-3 md:flex-row">
        @if ($searchModel != '')
            <div class="relative mx-2 rounded-md shadow-sm md:order-1">
                <div class="pointer-events-none absolute inset-y-0 flex items-center ps-3 start-0">
                    <span class="text-gray-500 sm:text-sm">
                        <svg class="h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <input
                    class="block w-full rounded-md border-gray-300 px-10 ps-10 focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
                    id="search-{{ $searchModel }}"
                    name="search-{{ $searchModel }}"
                    type="text"
                    wire:model.debounce.500ms="{{ $searchModel }}"
                    placeholder="{{ __('Search') }}">
            </div>
        @endif
        <div class="order-1 mx-2 md:order-2">
            <div>
                {{ $actions }}
            </div>
        </div>
    </div>
@endif

@if ($filters != '')
    <div class="rounded-md bg-gray-50 p-4 text-sm text-gray-800 shadow dark:text-gray-200">
        {{ $filters }}
    </div>
@endif

<div class="overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-md">
    <ul>
        {{ $data }}
    </ul>
</div>
