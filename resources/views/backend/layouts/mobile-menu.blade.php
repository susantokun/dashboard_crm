<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">

        <a href="{{ url('/') }}" class="mr-auto flex h-[70px] items-center">
            <img alt="{{ $configuration->title }}" class="w-6" src="{{ asset('/storage/' . $configuration->logo) }}">
            <span class="block ml-3 text-lg text-white menu-title">
                {{ $configuration->title }}
            </span>
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul class="hidden border-t border-white/[0.08] py-5">
        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->segment(1) == 'dashboard' ? 'menu menu-active' : 'menu' }}">
                <div class="menu-icon">
                    <i data-feather="home"></i>
                </div>
                <div class="menu-title">
                    {{ __('Dashboard') }}
                </div>
            </a>
            <a href="/sales/contact" class="{{ request()->segment(1) == 'sales' ? 'menu menu-active' : 'menu' }}">
                <div class="menu-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="menu-title">
                    {{ __('Sales Contract') }}
                </div>
            </a>
            <a href="/sales/order" class="{{ request()->segment(1) == 'sales' ? 'menu menu-active' : 'menu' }}">
                <div class="menu-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="menu-title">
                    {{ __('Sales Order') }}
                </div>
            </a>
            <a href="/billing" class="{{ request()->segment(1) == 'billing' ? 'menu menu-active' : 'menu' }}">
                <div class="menu-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="menu-title">
                    {{ __('Billing') }}
                </div>
            </a>

            <a href="javascript:;" class="{{ request()->segment(1) == 'settings' ? 'menu menu-active' : 'menu' }}">
                <div class="menu-icon">
                    <i data-feather="settings"></i>
                </div>
                <div class="menu-title">
                    {{ __('Settings') }}
                    <div class="menu-sub-icon {{ request()->segment(1) == 'settings' ? 'transform rotate-180' : '' }}">
                        <i data-feather="chevron-down"></i>
                    </div>
                </div>
            </a>


            <ul class="{{ request()->segment(1) == 'settings' ? 'menu-sub-open' : '' }}">

                <li>
                    <a href="javascript:;"
                       class="{{ request()->segment(1) == 'settings' && request()->segment(2) == 'configurations' ? 'menu menu-active' : 'menu' }}">
                        <div class="menu-icon">
                            <i data-feather="corner-down-right"></i>
                        </div>
                        <div class="menu-title">
                            {{ __('Configurations') }}
                            <div
                                 class="menu-sub-icon {{ request()->segment(1) == 'settings' && request()->segment(2) == 'configurations' ? 'transform rotate-180' : '' }}">
                                <i data-feather="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="{{ request()->segment(2) == 'configurations' ? 'menu-sub-open' : '' }}">
                        <li>
                            <a href="{{ route('settings.configurations.general') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'general' ? 'menu menu-active' : 'menu' }}">
                                <div class="menu-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="menu-title">
                                    {{ __('General') }}
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.configurations.contact') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'contact' ? 'menu menu-active' : 'menu' }}">
                                <div class="menu-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="menu-title">
                                    {{ __('Contact') }}
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.configurations.about') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'about' ? 'menu menu-active' : 'menu' }}">
                                <div class="menu-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="menu-title">
                                    {{ __('About') }}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</div>
