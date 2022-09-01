<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTaskNew extends Component
{
    public $categories;
    public $statuses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $statuses)
    {
        $this->categories = $categories;
        $this->statuses = $statuses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-task-new');
    }
}
