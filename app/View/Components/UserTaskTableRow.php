<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTaskTableRow extends Component
{
    public $sn;
    public $id;
    public $firstName;
    public $lastName;
    public $title;
    public $category;
    public $deadline;
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $sn, $firstName, $lastName, $title, $category, $deadline, $status)
    {
        $this->sn = $sn;
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->category = $category;
        $this->deadline = $deadline;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-task-table-row');
    }
}
