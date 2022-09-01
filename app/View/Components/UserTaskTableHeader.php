<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTaskTableHeader extends Component
{

    public $col1;
    public $col2;
    public $col3;
    public $col4;
    public $col5;
    public $iconLabel1;
    public $iconLabel2;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($col1, $col2, $col3, $col4, $col5, $iconLabel1, $iconLabel2)
    {
        $this->col1 = $col1;
        $this->col2 = $col2;
        $this->col3 = $col3;
        $this->col4 = $col4;
        $this->col5 = $col5;
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
        return view('components.user-task-table-header');
    }
}
