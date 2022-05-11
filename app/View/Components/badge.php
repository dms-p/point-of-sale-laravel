<?php

namespace App\View\Components;

use Illuminate\View\Component;

class badge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
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
        return view('components.badge');
    }
}
