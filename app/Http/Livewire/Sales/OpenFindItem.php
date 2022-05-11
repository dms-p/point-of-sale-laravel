<?php

namespace App\Http\Livewire\Sales;

use App\Models\items;
use Livewire\Component;
use Livewire\WithPagination;

class OpenFindItem extends Component
{
    use WithPagination;
    public $keyword;
    public function updatingKeyword()
    {
        $this->resetPage();
    }
    public function add($id)
    {
        $this->emitUp('add',$id);
        $this->emitUp('modalOff');
    }
    public function render()
    {
        return view('livewire.sales.open-find-item',['items'=>items::where('name','like','%'.$this->keyword.'%')->paginate(5)]);
    }
}
