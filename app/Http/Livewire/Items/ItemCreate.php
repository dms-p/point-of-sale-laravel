<?php

namespace App\Http\Livewire\Items;

use App\Helpers\IdTable;
use App\Models\brand;
use App\Models\category;
use App\Models\items;
use App\Models\supplier;
use App\Models\uom;
use Livewire\Component;

class ItemCreate extends Component
{
    public $item,$uoms,$categories,$suppliers,$brands;

    protected $rules = [
        'item.name'=>'required|min:3',
        'item.code'=>"required|unique:items,code",
        'item.cost'=>'required|integer',
        'item.price'=>'required|integer',
        'item.qty'=>'required|integer',
        'item.brand_id'=>'required',
        'item.uom_id'=>'required',
        'item.supplier_id'=>'required',
        'item.category_id'=>"required",
        'item.discontinue'=>'required',
        'item.description'=>'required'
    ];
    
    public function mount()
    {
        $this->item['code']=IdTable::item();
        $this->item['slug']=uniqid('item');
        $this->categories=category::all(['id','name']);
        $this->brands=brand::all(['id','name']);
        $this->uoms=uom::all(['id','name']);
        $this->suppliers=supplier::all(['id','name']);
    }
    public function store()
    {
        $this->validate();
        try {
            $item=items::create($this->item);
            /**reset form start */
            $this->resetExcept(['uoms','brands','categories','suppliers']);
            $this->item['code']=IdTable::item();
            $this->item['slug']=uniqid('item');
            /**reset form end */
            $this->emit('swalAlert',alert("success","Success save ".$item->name));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.items.item-create');
    }
}
