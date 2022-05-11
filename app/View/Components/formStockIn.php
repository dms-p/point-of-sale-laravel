<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formStockIn extends Component
{
    public $stockInId;
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stockInId,$items)
    {
        $this->stockInId=$stockInId;
        $this->items=$items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-stock-in');
    }
}
