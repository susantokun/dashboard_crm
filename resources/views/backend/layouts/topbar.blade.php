<div class="topbar">
    <div class="hidden mr-auto -te-x xl:flex">
        <div class="p-2 overflow-hidden rounded-md cursor-pointer toggle topbar-menu bg-slate-200 hover:bg-slate-300/90">
            <i data-feather="menu" class="w-5 h-5 text-primary topbar-menu-icon"></i>
        </div>
    </div>

    {{-- <div class="mr-auto te-x dropdown xl:mr-6">
        <div class="cursor-pointer dropdown-toggle notification notification-bullet" role="button" aria-expanded="false"
             data-tw-toggle="dropdown">
            <i data-feather="bell" class="notification-icon"></i>
        </div>
        <div class="pt-2 notification-content dropdown-menu">
            <div class="notification-content-box dropdown-content">
                <div class="notification-content-title">Notifications</div>
            </div>
        </div>
    </div> --}}

    <div class="w-8 h-8 te-x dropdown">
        <div class="w-8 h-8 overflow-hidden rounded-full shadow-lg dropdown-toggle image-fit zoom-in" role="button"
             aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="{{ auth()->user()->name }}" class="object-cover object-center w-full h-full"
                 src="{{ isset(auth()->user()->picture) ? url('/storage/' . auth()->user()->picture) : env('APP_URL_AVATAR_UI') . auth()->user()->name }}">
        </div>
        <div class="w-56 dropdown-menu">
            <ul class="text-white dropdown-content bg-primary">
                <li class="p-2">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="mt-0.5 text-xs text-white/70">{{ auth()->user()->identifier }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> {{ __('Logout') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
