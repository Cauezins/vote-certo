<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SideBarAdmin extends Component
{
    public $position;
    public $viewName;
    public $dataElections;
    public $idElec;
    /**
     * Create a new component instance.
     */
    public function __construct($position = null, $view = null, $dataElections = null, $idElection = null)
    {
        $this->position = $position;
        $this->viewName = $view;
        $this->dataElections = $dataElections;
        $this->idElec = $idElection;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.side-bar-admin');
    }
}
