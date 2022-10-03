<?php

namespace App\View\Composers;

use App\Models\Menu;
use App\Enums\MenuStatus;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = Menu::orderBy('order', 'asc')->orderBy('created_at', 'desc')
            ->where('status', MenuStatus::ACTIVE)
            ->whereNull('parent_id')
            ->with('children', fn ($query) => $query->orderBy('order', 'asc')->orderBy('created_at', 'desc')->where('status', MenuStatus::ACTIVE))
            ->get();
        $view->with('menus', $menus);
    }
}
