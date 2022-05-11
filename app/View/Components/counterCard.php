<?php

namespace App\View\Components;

use Illuminate\View\Component;

class counterCard extends Component
{
    public $color;
    public $counter;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color,$counter,$title)
    {
        $this->color=$color;
        $this->counter=$counter;
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.counter-card');
    }
}
