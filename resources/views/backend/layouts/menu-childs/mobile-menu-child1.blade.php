<ul class="{{ request()->segment(1) == explode('/', $menu->url)[0] ? 'menu-sub-open' : '' }}">
    @foreach ($child1 as $childItem1)
        @can($childItem1->permission_name)
            <li>
                <a href="{{ $childItem1->children->count() ? 'javascript:;' : url($childItem1->url) }}"
                   class="{{ request()->segment(1) == explode('/', $menu->url)[0] && request()->segment(2) == explode('/', $childItem1->url)[1] ? 'menu menu-active' : 'menu' }}">
                    <div class="menu-icon">
                        <i data-feather="{{ $childItem1->icon ?? 'corner-down-right' }}"></i>
                    </div>
                    <div class="menu-title">
                        {{ $childItem1->name }}
                        @if ($childItem1->children->count() > 0)
                            <div
                                 class="menu-sub-icon {{ request()->segment(1) == explode('/', $menu->url)[0] && request()->segment(2) == explode('/', $childItem1->url)[1] ? 'transform rotate-180' : '' }}">
                                <i data-feather="chevron-down"></i>
                            </div>
                        @endif
                    </div>
                </a>
                @if ($childItem1->children->count())
                    @include('backend.layouts.menu-childs.mobile-menu-child2', [
                        'child2' => $childItem1->children,
                    ])
                @endif
            </li>
        @endcan
    @endforeach
</ul>
