<?php

namespace App\Http\Livewire\Brands;

use Livewire\Component;
use App\Models\brand;

class BrandCreate extends Component
{
    public $brand;
    protected $rules=['brand.name'=>"required","brand.description"=>"required"];

    public function save()
    {
        $this->validate();
        try {
            $data=brand::create($this->brand);
            $this->reset('brand');
            $this->emit('handleSave');
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success save ".$data->name));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps 😭","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.brands.brand-create');
    }
}
