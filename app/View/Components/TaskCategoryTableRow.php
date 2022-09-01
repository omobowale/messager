<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TaskCategoryTableRow extends Component
{
    public $sn;
    public $id;
    public $title;
    public $status;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $sn, $title, $status)
    {
        $this->sn = $sn;
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.task-category-table-row');
    }
}
