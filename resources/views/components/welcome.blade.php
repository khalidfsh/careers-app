<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-20 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        @auth
            {{ __('Welcome') }}, {{ Auth::user()->name }}!
        @else
            {{ __('Welcome guest!') }}!
        @endauth
    </h1>

    <p class="mt-2 text-gray-600 dark:text-gray-400">
        {{ __('We are the best job board in the world.') }}
    </p>
</div>

