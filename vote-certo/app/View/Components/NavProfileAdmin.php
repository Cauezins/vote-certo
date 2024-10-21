<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NavProfileAdmin extends Component
{
    public $name;
    public $imageProfile;
    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $image_profile)
    {
        $this->name = $name;
        $this->imageProfile = $image_profile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.nav-profile-admin');
    }
}
