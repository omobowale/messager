<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserMessageTableRow extends Component
{
    public $id;
    public $firstName;
    public $lastName;
    public $title;
    public $content;
    public $dateAndTime;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $firstName, $lastName, $title, $content, $dateAndTime)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
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
