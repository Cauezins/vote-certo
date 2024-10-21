<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SideBarAdmin extends Component
{
    public $position;
    public $viewName;
    /**
     * Create a new component instance.
     */
    public function __construct($position = null, $view = null)
    {
        $this->position = $position;
        $this->viewName = $view;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.side-bar-admin');
    }
}
