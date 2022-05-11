<?php

namespace App\View\Components;

use Illuminate\View\Component;

class linkUrlButton extends Component
{
    public $url;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url,$title=null)
    {
        $this->url=$url;
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.link-url-button');
    }
}
