<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UsersAdmin extends Component
{
    public $name;
    public $position;
    public $imageProfile;
    public $dataItems;
    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $position = null, $image_profile = null, $data = null)
    {
        $this->name = $name;
        $this->position = $position;
        $this->imageProfile = $image_profile;
        $this->dataItems = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.users.users');
    }
}
