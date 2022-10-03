<nav class="sidebar">
    <a href="{{ url('/') }}" class="flex h-[70px] items-center justify-center py-5 px-5 xl:justify-start">
        <img alt="{{ $configuration->title }}" class="w-12 rounded-lg xl:w-10"
             src="{{ asset('/storage/' . $configuration->logo) }}">
        <span class="hidden ml-3 text-lg font-bold uppercase truncate te-x sidebar-title text-light xl:block">
            {{ $configuration->title }}
        </span>
    </a>
    <div class="mb-6 -mt-0.5 border border-white/10"></div>
    <ul class="px-4 navigation">
        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->segment(1) == 'dashboard' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                <div class="sidebar-content-icon">
                    <i data-feather="home"></i>
                </div>
                <div class="sidebar-content-title">
                    {{ __('Dashboard') }}
                </div>
            </a>
            <a href="{{ route('sales-contracts.table') }}"
               class="{{ request()->segment(1) == 'sales-contracts' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                <div class="sidebar-content-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="sidebar-content-title">
                    {{ __('Sales Contract') }}
                </div>
            </a>
            <a href="{{ route('sales-orders.table') }}"
               class="{{ request()->segment(1) == 'sales-orders' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                <div class="sidebar-content-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="sidebar-content-title">
                    {{ __('Sales Order') }}
                </div>
            </a>
            <a href="{{ route('billings.table') }}"
               class="{{ request()->segment(1) == 'billings' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                <div class="sidebar-content-icon">
                    <i data-feather="activity"></i>
                </div>
                <div class="sidebar-content-title">
                    {{ __('Billing') }}
                </div>
            </a>

            <a href="javascript:;"
               class="{{ request()->segment(1) == 'settings' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                <div class="sidebar-content-icon">
                    <i data-feather="settings"></i>
                </div>
                <div class="sidebar-content-title">
                    {{ __('Settings') }}
                    <div
                         class="sidebar-content-sub-icon {{ request()->segment(1) == 'settings' ? 'transform rotate-180' : '' }}">
                        <i data-feather="chevron-down"></i>
                    </div>
                </div>
            </a>


            <ul class="{{ request()->segment(1) == 'settings' ? 'sidebar-content-sub-open' : '' }}">

                <li>
                    <a href="javascript:;"
                       class="{{ request()->segment(1) == 'settings' && request()->segment(2) == 'configurations' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                        <div class="sidebar-content-icon">
                            <i data-feather="corner-down-right"></i>
                        </div>
                        <div class="sidebar-content-title">
                            {{ __('Configurations') }}
                            <div
                                 class="sidebar-content-sub-icon {{ request()->segment(1) == 'settings' && request()->segment(2) == 'configurations' ? 'transform rotate-180' : '' }}">
                                <i data-feather="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="{{ request()->segment(2) == 'configurations' ? 'sidebar-content-sub-open' : '' }}">
                        <li>
                            <a href="{{ route('settings.configurations.general') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'general' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                                <div class="sidebar-content-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="sidebar-content-title">
                                    {{ __('General') }}
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.configurations.contact') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'contact' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                                <div class="sidebar-content-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="sidebar-content-title">
                                    {{ __('Contact') }}
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.configurations.about') }}"
                               class="{{ request()->segment(2) == 'configurations' && request()->segment(3) == 'about' ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                                <div class="sidebar-content-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                                <div class="sidebar-content-title">
                                    {{ __('About') }}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</nav>
