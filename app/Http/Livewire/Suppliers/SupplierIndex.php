<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierIndex extends Component
{
    use WithPagination;
    public $search,$listCount,$supplierId,$supplier,$items,$modal=false;
    protected $rules=[
        'supplier.name'=>"required",
        'supplier.email'=>"required|email|",
        "supplier.phone"=>"required",
        "supplier.address"=>"required|min:3"
    ];
    protected $listeners=['confirmDelete','destroy'];
    public function mount()
    {
        $this->listCount=10;
    }
    public function modalOff()
    {
        $this->modal=false;
        $this->reset(['supplier','supplierId']);
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
        $this->validate();
        try {
            if (!empty($this->customerId)) {
                supplier::where('id',$this->supplierId)->update($this->supplier->toArray());
            }else{
                supplier::create($this->supplier);
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
        $this->supplierId=$id;
        $this->supplier=supplier::find($id);
        $this->modalOn();
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            supplier::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Success","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.suppliers.supplier-index',['suppliers'=>supplier::where('name','like','%'.$this->search."%")->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
