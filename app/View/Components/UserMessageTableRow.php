<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserMessageTableRow extends Component
{
    public $id;
    public $username;
    public $title;
    public $content;
    public $dateAndTime;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $username,$title, $content, $dateAndTime)
    {
        $this->id = $id;
        $this->username = $username;
        $this->title = $title;
        $this->content = $content;
        $this->dateAndTime = $dateAndTime;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-message-table-row');
    }
}
