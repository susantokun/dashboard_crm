<nav class="relative grid items-center w-full grid-cols-12 px-4 select-none h-14" x-data="{ open: false }">
    <div class="flex justify-between col-span-12 px-2 lg:col-span-10 lg:col-start-2">

        <div class="">
            <a href="{{ route('home') }}" class="flex items-center h-full te-x">
                <img alt="{{ $configuration->title }}" class="h-8" width="auto" height="32px"
                     src="{{ asset('/storage/' . $configuration->logo) }}" />
                <span class="ml-3 text-2xl font-semibold sidebar-title">
                    {{ $configuration->title }}
                </span>
            </a>
        </div>

        <div class="relative">
            <ul class="items-center hidden gap-4 font-semibold lg:flex">
                @if (Route::has('login'))
                    @auth
                        <li class="te-x">
                            <a class="inline-flex select-none items-center rounded-md border border-transparent bg-primary px-4 py-1.5 text-sm font-semibold tracking-wide text-white shadow-sm transition duration-150 ease-in-out hover:bg-primary/70 focus:outline-none active:bg-primary/90 disabled:opacity-25"
                               href="{{ url('/dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>

                        <li class="-ml-2 te-x">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                   class="inline-flex select-none items-center rounded-md border border-transparent bg-primary px-4 py-1.5 text-sm font-semibold tracking-wide text-white shadow-sm transition duration-150 ease-in-out hover:bg-primary/70 focus:outline-none active:bg-primary/90 disabled:opacity-25"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="space-x-2 te-x">
                            <a class="inline-flex select-none items-center rounded-md border border-transparent bg-primary px-4 py-1.5 text-sm font-semibold tracking-wide text-white shadow-sm transition duration-150 ease-in-out hover:bg-primary/70 focus:outline-none active:bg-primary/90 disabled:opacity-25"
                               href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endauth
                @endif

            </ul>

            <div class="flex items-center lg:hidden">
                <button @click="open = ! open"
                        class="p-2 overflow-hidden text-white border border-white rounded-md cursor-pointer bg-primary hover:bg-primary/80 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div :class="{ 'block': open, 'hidden': !open }"
             class="absolute hidden w-64 py-3 mt-1 rounded-lg shadow-xl top-14 right-6 bg-dark text-light lg:hidden">
            <div class="flex flex-col items-start justify-start w-full space-y-1">

                @auth
                    <a href="{{ route('dashboard') }}" class="w-full px-6 py-2 text-light hover:bg-white/10">
                        {{ __('Dashboard') }}
                    </a>
                    <div class="w-full h-px bg-gradient-to-r from-white via-white/20 to-transparent"></div>
                @endauth

                <a href="javascript: scroll('home');"
                   class="hover:bg-white/10{{ request()->routeIs('frontend.home') ? ' border border-primary bg-white/10' : '' }} w-full px-6 py-2 text-light">
                    {{ __('Home') }}
                </a>

                <div class="w-full h-px bg-gradient-to-r from-white via-white/20 to-transparent"></div>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="flex w-full">
                        @csrf

                        <a href="{{ route('logout') }}" class="w-full px-6 py-2 text-light hover:bg-white/10"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="w-full px-6 py-2 text-light hover:bg-white/10">{{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="w-full px-6 py-2 text-light hover:bg-white/10">{{ __('Register') }}</a>
                    @endif
                @endguest

            </div>
        </div>
    </div>
</nav>
