<?php

namespace App\Http\Livewire\Items;

use App\Models\items;
use App\Models\supplier;
use App\Models\brand;
use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    use WithPagination;

    public $search,
    $listCount,
    $categoryId,
    $brandId,
    $supplierId,
    $categories,
    $brands,
    $suppliers;

    protected $listeners=['confirmDelete','destroy'];

    public function mount()
    {
        $this->listCount=10;
        $this->categoryId=null;
        $this->brandId=null;
        $this->supplierId=null;
        $this->brands=brand::all(['id','name']);
        $this->categories=category::all(['id','name']);
        $this->suppliers=supplier::all(['id','name']);
    }
    public function render()
    {
        return view('livewire.items.item-index',['items'=>items::select([
            'category_id','brand_id','supplier_id','uom_id','slug','name','price','cost','qty','code'
        ])->with(['category','uom','supplier','brand'])->where('name','like','%'.$this->search."%")->when($this->brandId,function($query,$brandId){
            return $query->where('brand_id',$brandId);
        })->when($this->supplierId,function($query,$supplierId){
            return $query->where('supplier_id',$supplierId);
        })->when($this->categoryId,function($query,$categoryId){
            return $query->where('category_id',$categoryId);
        })->paginate($this->listCount)]);
    }
    public function confirmDelete(items $item)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$item->id]);
    }
    public function destroy($id)
    {
        try {
            items::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!!","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
}
