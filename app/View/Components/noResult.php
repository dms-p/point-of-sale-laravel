<?php

namespace App\View\Components;

use Illuminate\View\Component;

class noResult extends Component
{
    public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count)
    {
        $this->count=$count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.no-result');
    }
}
