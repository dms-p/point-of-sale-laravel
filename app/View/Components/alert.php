<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color)
    {
        $this->color=$color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
