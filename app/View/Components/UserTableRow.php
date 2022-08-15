<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTableRow extends Component
{
    public $id;
    public $fullName;
    public $email;
    public $phoneNumber;
    public $status;
    public $color;
    public $isActive;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $fullName, $email, $phoneNumber, $status, $color, $isActive)
    {
        
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->status = $status;
        $this->color = $color;
        $this->isActive = $isActive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-table-row');
    }
}
