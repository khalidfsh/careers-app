@props(['filters' => '', 'actions' => '', 'data' => '', 'searchModel' => ''])
<div class="mb-5">
    @if( session()->has('flash.banner') )
        <x-banner style="{{ session('flash.bannerStyle') }}" message="{{ session('flash.banner') }}" />
    @endif
</div>

@if ( $searchModel != '' || $actions != '' )
<div class="flex flex-col md:flex-row justify-between gap-3 mb-5">
    @if ( $searchModel != '' )
    <div class="ms-2 me-2 relative rounded-md shadow-sm  md:order-1">
        <div class="absolute inset-y-0 start-0 ps-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
        <input wire:model.debounce.500ms="{{ $searchModel }}" type="text" name="search-{{ $searchModel }}" id="search-{{ $searchModel }}" class="focus:ring-teal-500 focus:border-teal-500 block w-full pl-10 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{ __("Search") }}">
    </div>
    @endif
    <div class="ms-2 me-2 order-1 md:order-2">
        <div>
            {{ $actions }}
        </div>
    </div>
</div>
@endif

@if ( $filters != '' )
<div class="bg-gray-50 shadow mb-5 p-4 rounded-md text-gray-800 dark:text-gray-200 text-sm">
    {{ $filters }}
</div>
@endif

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-md">
    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
        {{ $data }}
    </ul>
</div>
        