<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserFilterTab extends Component
{
    public $statusName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($statusName)
    {
        $this->statusName = $statusName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-filter-tab');
    }
}
