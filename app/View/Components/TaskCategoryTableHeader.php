<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TaskCategoryTableHeader extends Component
{
    public $col1;
    public $col2;
    public $col3;
    public $iconLabel1;
    public $iconLabel2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($col1, $col2, $col3, $iconLabel1, $iconLabel2)
    {
        $this->col1 = $col1;
        $this->col2 = $col2;
        $this->col3 = $col3;
        $this->iconLabel1 = $iconLabel1;
        $this->iconLabel2 = $iconLabel2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.task-category-table-header');
    }
}
