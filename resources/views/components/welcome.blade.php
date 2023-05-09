<div class="mt-16">
    <h1 class="text-start font-extrabold text-gray-900 dark:text-white text-4xl sm:tracking-tight lg:text-6xl">
        {{ __('انضم الى فريق') }}
        <span class="text-violet-950 dark:text-emerald-700">{{ __('عملنا') }}</span>
    </h1>
    <p class="ms-4 my-4 text-start text-lg text-gray-500 dark:text-gray-400">
        {{ __('لديك 3 خطوات لتصبح واحدا من فريق عملنا') }}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:gap-8">
        <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
            href={{ url('/resume') }}>
            <div>
                <div
                    class="flex h-16 w-16 items-center justify-center rounded-full">
                    <svg class="h-14 w-14 stroke-black dark:stroke-gray-300" width="112" height="112" viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M97.1652 60.1499V92.5383C97.1652 95.0937 95.0937 97.1652 92.5383 97.1652H18.5077C15.9523 97.1652 13.8807 95.0937 13.8807 92.5383V18.5077C13.8807 15.9523 15.9523 13.8807 18.5077 13.8807H50.896" stroke-opacity="0.8" stroke-width="9.25383" stroke-linecap="round" stroke-linejoin="round"/>
                        <path class="fill-violet-950 dark:fill-emerald-700" d="M32.3884 61.8153V78.6575H49.3164L97.1652 30.7877L80.2656 13.8807L32.3884 61.8153Z" fill-opacity="0.8" stroke-opacity="0.8" stroke-width="9.25383" stroke-linejoin="round"/>
                    </svg>            
                </div>

                <h2 class="mt-6 text-3xl font-semibold text-gray-900 dark:text-white">{{ __('تقديم السرة الذاتية') }}
                </h2>

                <p class="mt-4 text-md leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ __('هل انت مهتم ببناء مسيرة مهنية معنا؟') }}
                </p>
                <p class="mb-4 text- d leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ __('قدم سيرتك الذاتية الان..') }}
                </p>

                {{-- svg arrow left if rtl --}}
                <div class="fixed bottom-2 end-0 transform" >
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
        <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
            href={{ url('/jobs') }}>
            <div>
                <div
                class="flex h-16 w-16 items-center justify-center rounded-full">
                    <svg class="h-14 w-14 stroke-black dark:stroke-gray-300" width="112" height="112" viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-violet-950 dark:fill-emerald-700" d="M48.5826 87.9113C70.3032 87.9113 87.9113 70.3031 87.9113 48.5825C87.9113 26.862 70.3032 9.25378 48.5826 9.25378C26.862 9.25378 9.25381 26.862 9.25381 48.5825C9.25381 70.3031 26.862 87.9113 48.5826 87.9113Z" fill-opacity="0.8" stroke-width="9.25383" stroke-linejoin="round"/>
                        <path class="stroke-white" d="M61.6693 33.1821C58.3201 29.8329 53.6932 27.7615 48.5826 27.7615C43.4719 27.7615 38.845 29.8329 35.4956 33.1821" stroke-width="9.25383" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M76.8572 76.8572L96.4875 96.4875" stroke-width="9.25383" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                                  
                </div>

                <h2 class="mt-6 text-3xl font-semibold text-gray-900 dark:text-white">{{ __('البحث عن وظيفة') }}
                </h2>

                <p class="my-4 text-md leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ __('ابحث عن الفرصه المثالية وتقدم اليها بكبسة زر..') }}
                </p>
                {{-- svg arrow left if rtl --}}
                <div class="fixed bottom-2 end-0 transform" >
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
        <a class="duration-250 flex scale-100 rounded-lg bg-white from-gray-700/50 via-transparent p-6 shadow-2xl shadow-gray-500/20 transition-all focus:outline focus:outline-2 focus:outline-indigo-500 motion-safe:hover:scale-[1.01] dark:bg-gray-800/50 dark:bg-gradient-to-bl dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/5"
            href={{ url('/resume') }}>
            <div>
                <div
                    cclass="flex h-16 w-16 items-center justify-center rounded-full">
                    <svg class="h-14 w-14 stroke-black dark:stroke-gray-300" width="112" height="112" viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M55.523 101.792C81.0767 101.792 101.792 81.0767 101.792 55.5229C101.792 29.9692 81.0767 9.25378 55.523 9.25378C29.9692 9.25378 9.25385 29.9692 9.25385 55.5229C9.25385 81.0767 29.9692 101.792 55.523 101.792Z"  stroke-width="9.25383" stroke-linecap="round" stroke-linejoin="round"/>
                        <path class="fill-violet-950 dark:fill-emerald-700" d="M55.523 53.2095C61.9114 53.2095 67.0903 48.0306 67.0903 41.6422C67.0903 35.2539 61.9114 30.075 55.523 30.075C49.1346 30.075 43.9557 35.2539 43.9557 41.6422C43.9557 48.0306 49.1346 53.2095 55.523 53.2095Z"  fill-opacity="0.8" stroke-width="7" stroke-linejoin="round"/>
                        <path d="M23.1855 88.6794C23.9806 76.623 34.0115 67.0902 46.2692 67.0902H64.7768C77.0182 67.0902 87.039 76.5978 87.8575 88.6315" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        
                        
                                  
                </div>

                <h2 class="mt-6 text-3xl font-semibold text-gray-900 dark:text-white">{{ __('حسابي') }}
                </h2>

                <p class="my-4 text-md leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ __('تحكم بعملية بحثك عن عمل من خلال  تحديث سيرتك الذاتية باستمرار ومتابعة طلباتك..') }}
                </p>
                {{-- svg arrow left if rtl --}}
                <div class="fixed bottom-2 end-0 transform" >
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
