<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{

    public $menu;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = collect(config('menu'))->map(function ($item) {
            $item['active'] = str_contains(request()->url(), $item['can_routes']);

            return $item;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.menu');
    }
}
