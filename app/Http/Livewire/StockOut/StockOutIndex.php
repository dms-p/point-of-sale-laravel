<?php

namespace App\Http\Livewire\StockOut;

use App\Models\items;
use App\Models\stockOut;
use Livewire\Component;
use Livewire\WithPagination;

class StockOutIndex extends Component
{
    use WithPagination;
    public $search,$listCount,$stockOutId,$stockOut,$items,$modal=false;
    protected $listeners=['confirmDelete','destroy'];
    protected $rules=[
        'stockOut.item_id'=>"required",
        'stockOut.qty'=>"required|integer",
        "stockOut.date"=>"required|date",
        "stockOut.note"=>"required|min:3"
    ];
    public function mount()
    {
        $this->listCount=10;
        $this->items=items::all(['id','name']);
    }
    public function modalOff()
    {
        $this->modal=false;
        $this->reset(['stockOut','stockOutId']);
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
            if (!empty($this->stockOutId)) {
                stockOut::find($this->stockOutId)->update($this->stockOut->toArray());
            }else{
                stockOut::create($this->stockOut);
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
        $this->stockOutId=$id;
        $this->stockOut=stockOut::find($id);
        $this->modalOn();
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            stockOut::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Success","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.stock-out.stock-out-index',['stockOuts'=>stockOut::with('item')->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
