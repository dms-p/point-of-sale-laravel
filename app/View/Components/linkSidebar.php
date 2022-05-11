<?php

namespace App\View\Components;

use Illuminate\View\Component;

class linkSidebar extends Component
{
    public $url;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url,$label)
    {
        $this->label=$label;
        $this->url=$url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.link-sidebar');
    }
}
