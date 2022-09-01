<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTaskTableBody extends Component
{
    public $tasks;
    public $categories;
    public $statuses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tasks, $categories, $statuses)
    {
        $this->tasks = $tasks;
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
        return view('components.user-task-table-body');
    }
}
