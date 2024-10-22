<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ElectionsAdmin extends Component
{
    public $name;
    public $position;
    public $imageProfile;
    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $position = null, $image_profile = null)
    {
        $this->name = $name;
        $this->position = $position;
        $this->imageProfile = $image_profile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.users.users');
    }
}
