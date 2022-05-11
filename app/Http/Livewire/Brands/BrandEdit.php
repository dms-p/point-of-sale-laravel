<?php

namespace App\Http\Livewire\Brands;

use App\Models\brand;
use Livewire\Component;

class BrandEdit extends Component
{
    public $brandId;
    public $brand;
    protected $rules=['brand.name'=>"required","brand.description"=>"required"];
    protected $listeners=['getEdit'];

    public function getEdit($id)
    {
        $this->brand=brand::find($id);
        $this->brandId=$id;
    }
    public function update()
    {
        $this->validate();
        try {
            brand::find($this->brandId)->update([
                'name'=>$this->brand->name,
                'description'=>$this->brand->description
            ]);
            $this->emit('handleSave');
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success update ".$this->brand->name));
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
        return view('livewire.brands.brand-edit');
    }
}
