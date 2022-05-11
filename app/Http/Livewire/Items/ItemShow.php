<?php

namespace App\Http\Livewire\Items;

use App\Models\items;
use Livewire\Component;

class ItemShow extends Component
{
    public $item;
    public function mount(items $item)
    {
        $this->item=$item;
    }
    public function render()
    {
        return view('livewire.items.item-show',['item'=>$this->item]);
    }
}
