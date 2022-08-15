<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomMessageInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $title;
    public $message;
    public $color;

    public function __construct($color, $name, $title, $message)
    {
        $this->name = $name;
        $this->title = $title;
        $this->message = $message;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-message-info');
    }
}
