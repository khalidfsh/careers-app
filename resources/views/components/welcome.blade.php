<div
    class="border-b border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent lg:p-8">

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        @auth
            {{ __('Welcome') }}, {{ Auth::user()->name }}!
        @else
            {{ __('Welcome guest!') }}!
        @endauth
    </h1>

    {{-- <p class="mt-2 text-gray-600 dark:text-gray-400">
        {{ __('We are the best job board in the world.') }}
    </p> --}}
</div>
