<x-guest-layout class="antialiased">
    <div
        class="bg-dots-darker dark:bg-dots-lighter relative min-h-screen bg-gray-100 bg-center selection:bg-indigo-500 selection:text-white dark:bg-gray-900 sm:flex sm:items-center sm:justify-center">
        @if (Route::has('login'))
            <div class="p-6 text-end sm:fixed sm:top-0 sm:end-0">
                @auth
                    <a class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-indigo-500 dark:text-gray-400 dark:hover:text-white"
                        href="{{ url('/home') }}">
                        {{ __('Home') }}</a>
                @else
                    <a class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-indigo-500 dark:text-gray-400 dark:hover:text-white"
                        href="{{ route('login') }}">
                        {{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a class="font-semibold text-gray-600 ms-4 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-indigo-500 dark:text-gray-400 dark:hover:text-white"
                            href="{{ route('register') }}">
                            {{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="mx-auto max-w-7xl p-6 lg:p-8">
            <div class="flex justify-center">
                <x-application-logo class="block h-20 w-auto" />
            </div>

            <x-welcome />
        </div>
    </div>
</x-guest-layout>
