<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomOtherMessageInfo extends Component
{
    public $title;
    public $message;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $message, $color)
    {
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
        return view('components.custom-other-message-info');
    }
}
