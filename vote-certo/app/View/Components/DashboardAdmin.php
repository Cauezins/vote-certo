<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DashboardAdmin extends Component
{
    public $name;
    public $position;
    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $position = null)
    {
        $this->name = $name;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard.dashboard');
    }
}
