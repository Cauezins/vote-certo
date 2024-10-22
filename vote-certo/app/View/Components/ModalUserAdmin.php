<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalUserAdmin extends Component
{
    public $id;
    public $image_profile;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $imageProfile)
    {
        $this->id = $id;
        $this->image_profile = $imageProfile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users.modal-user');
    }
}
