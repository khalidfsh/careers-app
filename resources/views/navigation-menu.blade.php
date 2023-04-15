<nav class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800"
    x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-12 w-auto" />
                    </a>
                    <div class="inline-flex ms-2">
                        <button
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2"
                            type="button"
                            role="switch"
                            aria-checked="false"
                            dir="ltr"
                            x-bind:class="darkMode ? 'bg-emerald-700' : 'bg-gray-200'"
                            x-on:click="darkMode = !darkMode">
                            <span class="sr-only">Dark mode toggle</span>
                            <span
                                class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out"
                                x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'">
                                <span
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    aria-hidden="true"
                                    x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'">
                                    <svg class="h-3 w-3 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                </span>
                                <span
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    aria-hidden="true"
                                    x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'">
                                    <svg class="h-3 w-3 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </div>

                    <div class="ms-2">
                        <button class="inline-flex"
                            type="button">
                            @if (app()->getLocale() == 'en')
                                <a class="text-base font-medium text-gray-800 dark:text-gray-100"
                                    href="{{ route('locale.switch', ['locale' => 'ar']) }}">عربي</a>
                            @else
                                <a href="{{ route('locale.switch', ['locale' => 'en']) }}"
                                    class="text-base font-medium text-gray-800 dark:text-gray-100"">EN</a>
                            @endif
                        </button>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('dashboard') }}"
                        :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('admin.jobs') }}"
                        :active="request()->routeIs('admin/jobs')">
                        {{ __('Jobs Mangment') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('admin.users') }}"
                        :active="request()->routeIs('admin/users')">
                        {{ __('Users Managment') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('resume') }}"
                        :active="request()->routeIs('resume')">
                        {{ __('Resume') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('jobs') }}"
                        :active="request()->routeIs('jobs')">
                        {{ __('Jobs') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ms-3">
                        <x-dropdown align="right"
                            width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700"
                                        type="button">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="h-4 w-4 ms-2 -me-0.5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative ms-3">
                    <x-dropdown align="right"
                        width="48">
                        <x-slot name="trigger">
                            @auth

                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button
                                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700"
                                            type="button">
                                            {{ Auth::user()->name }}

                                            <svg class="h-4 w-4 ms-2 -me-0.5"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            @else
                                <span class="inline-flex rounded-md">
                                    <button
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700"
                                        type="button">
                                        {{ __('Login') }}

                                        <svg class="h-4 w-4 ms-2 -me-0.5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endauth
                        </x-slot>

                        <x-slot name="content">
                            @auth
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST"
                                    action="{{ route('logout') }}"
                                    x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <x-dropdown-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-dropdown-link>

                                @if (Route::has('register'))
                                    <x-dropdown-link href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </x-dropdown-link>
                                @endif
                            @endauth
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
                    @click="open = ! open">
                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">
                        <path class="inline-flex"
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden"
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="hidden sm:hidden"
        :class="{ 'block': open, 'hidden': !open }">
        <div class="space-y-1 pt-2 pb-3">
            <x-responsive-nav-link href="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <div class="space-y-1 pt-2 pb-3">
                <x-responsive-nav-link href="{{ route('admin.jobs') }}"
                    :active="request()->routeIs('admin.jobs')">
                    {{ __('Jobs Mangment') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('admin.jobs') }}"
                    :active="request()->routeIs('admin.users')">
                    {{ __('Users Managment') }}
                </x-responsive-nav-link>
                <div class="space-y-1 pt-2 pb-3">
                    <x-responsive-nav-link href="{{ route('resume') }}"
                        :active="request()->routeIs('resume')">
                        {{ __('Resume') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('jobs') }}"
                        :active="request()->routeIs('jobs')">
                        {{ __('Jobs') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="border-t border-gray-200 pt-4 pb-1 dark:border-gray-600">
                    <div class="flex items-center px-4">
                        @if (Auth::check())
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 me-3">
                                    <img class="h-10 w-10 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif
                            <div>
                                <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                                    {{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        @else
                            <div>
                                <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                                    {{ __('Guest') }}</div>
                                <div class="text-sm font-medium text-gray-500">{{ __('Please login') }}</div>
                            </div>
                        @endif
                    </div>

                    @if (Auth::check())
                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-responsive-nav-link href="{{ route('profile.show') }}"
                                :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                                    :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST"
                                action="{{ route('logout') }}"
                                x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                    :active="request()->routeIs('teams.show')">
                                    {{ __('Team Settings') }}
                                </x-responsive-nav-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-responsive-nav-link href="{{ route('teams.create') }}"
                                        :active="request()->routeIs('teams.create')">
                                        {{ __('Create New Team') }}
                                    </x-responsive-nav-link>
                                @endcan

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team"
                                        component="responsive-nav-link" />
                                @endforeach
                            @endif
                        </div>
                    @else
                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link href="{{ route('login') }}"
                                :active="request()->routeIs('login')">
                                {{ __('Login') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="{{ route('register') }}"
                                :active="request()->routeIs('register')">
                                {{ __('Register') }}
                            </x-responsive-nav-link>
                        </div>
                    @endif
                </div>
            </div>
</nav>
