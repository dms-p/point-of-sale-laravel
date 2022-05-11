<?php

namespace App\Http\Livewire\StockIn;

use App\Models\items;
use App\Models\stockIn;
use Livewire\Component;
use Livewire\WithPagination;

class StockInIndex extends Component
{
    use WithPagination;
    public $search,$listCount,$stockInId,$stockIn,$items,$modal=false;
    protected $listeners=['confirmDelete','destroy'];
    protected $rules=[
        'stockIn.item_id'=>"required",
        'stockIn.qty'=>"required|integer",
        "stockIn.date"=>"required|date",
        "stockIn.note"=>"required|min:3"
    ];
    public function mount()
    {
        $this->listCount=10;
        $this->items=items::all(['id','name']);
    }
    public function modalOff()
    {
        $this->modal=false;
        $this->reset(['stockIn','stockInId']);
    }
    public function modalOn()
    {
        $this->modal=true;
    }
    public function openModal()
    {
        $this->modal=true;
    }
    public function store()
    {
        session()->forget(['type','message']);
        $this->validate();
        try {
            if (!empty($this->stockInId)) {
                stockIn::find($this->stockInId)->update($this->stockIn->toArray());
            }else{
                stockIn::create($this->stockIn);
            }
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success save data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps 😭","text"=>$th->getMessage()));
        }
        $this->modalOff();
        $this->resetPage();
    }
    public function edit($id)
    {
        $this->stockInId=$id;
        $this->stockIn=stockIn::find($id);
        $this->modalOn();
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            stockIn::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Success","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.stock-in.stock-in-index',['stockIns'=>stockIn::with('item')->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
