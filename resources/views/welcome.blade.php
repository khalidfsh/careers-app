<x-guest-layout class="antialiased">
    <div
        class="bg-dots-darker dark:bg-dots-lighter relative min-h-screen bg-gray-100 bg-center selection:bg-indigo-500 selection:text-white dark:bg-gray-900 sm:flex sm:items-center sm:justify-center">
        @if (Route::has('login'))
            <div class="p-6 text-end sm:fixed sm:top-0 sm:end-0">
                @auth
                    <a class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-indigo-500 dark:text-gray-400 dark:hover:text-white"
                        href="{{ url('/dashboard') }}">
                        {{ __('Dashboard') }}</a>
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

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                    <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
                        href={{ url('/jobs') }}>
                        {{-- Careers App Job List discrption and job svg --}}
                        <div>
                            <div
                                class="bg-violet-950/20 flex h-16 w-16 items-center justify-center rounded-full dark:bg-emerald-700/20">
                                <svg class="h-7 w-7 rtl:rotate-180 rtl:transform dark:stroke-emerald-700"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
                                    </path>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ __('Jobs') }}
                            </h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ __('Find your dream job. Browse our job listings and apply for your dream job.') }}
                            </p>

                            <div class="fixed bottom-2 left-0 transform">
                                <svg class="left stroke-emerald-950 mx-6 h-6 w-6 shrink-0 self-center rtl:rotate-180 rtl:transform"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>

                        </div>
                    </a>
                    <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
                        href={{ url('/resume') }}>
                        <div>
                            <div
                                class="bg-violet-950/20 flex h-16 w-16 items-center justify-center rounded-full dark:bg-emerald-700/20">
                                <svg class="rtl:scale-x-(-1) storke-violet-950 h-7 w-7 dark:stroke-emerald-700"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z">
                                    </path>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ __('Resume') }}
                            </h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ __('Create your resume in minutes with our resume builder. or just auto generat from your resume! You’ll get a professional resume that will help you land your dream job.') }}

                            </p>

                            {{-- svg arrow left if rtl --}}
                            <div class="fixed bottom-2 left-0 transform">
                                <svg class="left stroke-violet-950 mx-6 h-6 w-6 shrink-0 self-center rtl:rotate-180 rtl:transform dark:stroke-emerald-700"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    {{-- Careers App Jobs Managment and updating n and manage svg --}}
                    <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
                        href={{ url('/admin/jobs') }}>
                        <div>
                            <div
                                class="bg-violet-950/20 flex h-16 w-16 items-center justify-center rounded-full dark:bg-emerald-700/20">
                                <svg class="stroke-violet-950 h-7 w-7 dark:stroke-emerald-700"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z">
                                    </path>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                {{ __('Govern and Manage') }}</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ __('Manage your jobs and resumes. You can update your jobs and resumes and manage them.') }}
                            </p>

                            <div class="fixed bottom-2 left-0 transform">
                                <svg class="left stroke-violet-950 mx-6 h-6 w-6 shrink-0 self-center rtl:rotate-180 rtl:transform dark:stroke-emerald-700"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </div>
                    </a>


                    {{-- Careers App admin Extract data of users and extract svg --}}
                    <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
                        href={{ url('/admin/users') }}>
                        <div>
                            <div
                                class="bg-violet-950/20 flex h-16 w-16 items-center justify-center rounded-full dark:bg-emerald-700/20">
                                <svg class="stroke-violet-950 h-7 w-7 dark:stroke-emerald-700"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                                    </path>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                {{ __('Import and Export') }}</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ __('Extract data of users and extract data of resumes and jobs. You can extract data of users and extract data of resumes and jobs.') }}
                            </p>

                            <div class="fixed bottom-2 left-0 transform">
                                <svg class="left stroke-violet-950 mx-6 h-6 w-6 shrink-0 self-center rtl:rotate-180 rtl:transform dark:stroke-emerald-700"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
