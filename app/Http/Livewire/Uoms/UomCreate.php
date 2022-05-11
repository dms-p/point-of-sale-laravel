<?php

namespace App\Http\Livewire\Uoms;

use App\Models\uom;
use Livewire\Component;

class UomCreate extends Component
{
    public $uom;
    protected $rules=['uom.name'=>"required","uom.description"=>"required"];

    public function save()
    {
        $this->validate();
        try {
            $data=uom::create($this->uom);
            $this->reset('uom');
            $this->emit('handleSave');
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success create data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps 😭","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.uoms.uom-create');
    }
}
