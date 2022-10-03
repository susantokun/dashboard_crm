<ul class="{{ request()->segment(2) == explode('/', $childItem1->url)[1] ? 'sidebar-content-sub-open' : '' }}">
    @foreach ($child2 as $childItem2)
        @can($childItem2->permission_name)
            <li>
                <a href="{{ $childItem2->children->count() ? 'javascript:;' : url($childItem2->url) }}"
                   class="{{ request()->segment(2) == explode('/', $childItem1->url)[1] && request()->segment(3) == explode('/', $childItem2->url)[2] ? 'sidebar-content sidebar-content-active' : 'sidebar-content' }}">
                    <div class="sidebar-content-icon">
                        <i data-feather="{{ $childItem2->icon ?? 'chevron-right' }}"></i>
                    </div>
                    <div class="sidebar-content-title">
                        {{ $childItem2->name }}
                        @if ($childItem2->children->count() > 0)
                            <div
                                 class="sidebar-content-sub-icon {{ request()->segment(2) == explode('/', $itemLevel2->url)[1] && request()->segment(3) == explode('/', $childItem2->url)[2] ? 'transform rotate-180' : '' }}">
                                <i data-feather="chevron-down"></i>
                            </div>
                        @endif
                    </div>
                </a>
                @if ($childItem2->children->count())
                    @include('backend.layouts.menu-childs.sidebar-child2', [
                        'child2' => $childItem2->children,
                    ])
                @endif
            </li>
        @endcan
    @endforeach
</ul>
