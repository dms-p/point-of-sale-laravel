<?php

namespace App\Http\Livewire\Items;

use App\Models\brand;
use App\Models\category;
use App\Models\items;
use App\Models\supplier;
use App\Models\uom;
use Livewire\Component;

class ItemEdit extends Component
{
    public $item,$uoms,$categories,$suppliers,$brands,$itemId;

    protected $rules = [
        'item.name'=>"",
        'item.code'=>"",
        'item.cost'=>"",
        'item.price'=>"",
        'item.qty'=>"",
        'item.brand_id'=>"",
        'item.uom_id'=>"",
        'item.supplier_id'=>"",
        'item.category_id'=>"",
        'item.discontinue'=>"",
        'item.description'=>""
    ];
    public function mount(items $item)
    {
        $this->itemId=$item->slug;
        $this->item=$item;
        $this->categories=category::all(['id','name']);
        $this->brands=brand::all(['id','name']);
        $this->uoms=uom::all(['id','name']);
        $this->suppliers=supplier::all(['id','name']);
    }
    public function update()
    {
        $this->validate([
            'item.name'=>'required|min:3',
            'item.code'=>"required|unique:items,code,".$this->item['id'],
            'item.cost'=>'required|integer',
            'item.price'=>'required|integer',
            'item.qty'=>'required|integer',
            'item.brand_id'=>'required',
            'item.uom_id'=>'required',
            'item.supplier_id'=>'required',
            'item.category_id'=>"required",
            'item.discontinue'=>'required',
            'item.description'=>'required'
        ]);
        try {
            items::whereSlug($this->itemId)->update($this->convertToArray($this->item));
            $this->emit('swalAlert',["icon"=>"success","title"=>"Yeay!!","text"=>"Success update data"]);
        } catch (\Throwable $th) {
            $this->emit('swalAlert',["icon"=>"error","title"=>"Opps","text"=>$th->getMessage()]);
        }
    }
    protected function convertToArray($item)
    {
        return [
            'name'=>$item->name,
            'code'=>$item->code,
            'cost'=>$item->cost,
            'price'=>$item->price,
            'qty'=>$item->qty,
            'brand_id'=>$item->brand_id,
            'uom_id'=>$item->uom_id,
            'supplier_id'=>$item->supplier_id,
            'category_id'=>$item->category_id,
            'discontinue'=>$item->discontinue,
            'description'=>$item->description,
            'slug'=>$item->slug
        ];
    }
    public function render()
    {
        return view('livewire.items.item-edit');
    }
}
