<?php

namespace App\Http\Livewire\Uoms;

use App\Models\uom;
use Livewire\Component;

class UomEdit extends Component
{
    public $uomId;
    public $uom;
    protected $rules=['uom.name'=>"required","uom.description"=>"required"];
    protected $listeners=['getEdit'];

    public function getEdit($id)
    {
        $this->uom=uom::find($id);
        $this->uomId=$id;
    }
    public function update()
    {
        $this->validate();
        try {
            uom::find($this->uomId)->update([
                'name'=>$this->uom->name,
                'description'=>$this->uom->description
            ]);
            $this->emit('handleSave');
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success update data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps 😭","text"=>$th->getMessage()));
        }
    }
    public function cancel()
    {
        $this->emitUp('cancel');
    }
    public function render()
    {
        return view('livewire.uoms.uom-edit');
    }
}
