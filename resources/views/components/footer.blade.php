<footer
    class="footer footer-center p-10 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl text-black dark:text-primary-content">
    <div class="grid grid-flow-col gap-4">
        <a class="link link-hover" href="{{ route('jobs') }}">{{ __('Jobs') }}</a>
        <a class="link link-hover" href="{{ route('resume') }}">{{ __('Resume') }}</a>
        {{-- <a class="link link-hover" >{{ __('About') }}</a>
        <a class="link link-hover">{{ __('Contact') }}</a>
        <a class="link link-hover">{{ __('FAQ') }}</a>
        <a class="link link-hover">{{ __('Help') }}</a> --}}
        <a class="link link-hover" href="{{ route('terms.show') }}">{{ __('Terms of use') }}</a>
        <a class="link link-hover" href="{{ route('policy.show') }}">{{ __('Privacy policy') }}</a>
    </div>
    <x-application-logo class="w-20 h-20" />
    <div class="items-center ">
        <p>{{ __('Copyright') }} &copy;
            {{ date('Y') . ' ' . __("Ha'il Heath Cluster") . '. ' . __('All rights reserved.') }}

        </p>
        <p>{{ __('Kingdom of Saudi Arabia') }}</p>
    </div>
    {{-- built with love --}}
    <p class="inline-flex text-xs ">
        {{ __('Built with') }}<span class="text-red-500">❤</span> {{ __('In') }} {{ __('KSA') }} 🇸🇦,
        <a class="link link-hover" href="https://www.github.com/khalidfsh">{{ __('by') }} {{ __('khalidfsh') }}
        </a>
    </p>

</footer>
