<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomCard extends Component
{
    public $number;
    public $text;
    public $iconName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($number, $text, $iconName)
    {
        $this->number = $number;
        $this->text = $text;
        $this->iconName = $iconName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-card');
    }
}
