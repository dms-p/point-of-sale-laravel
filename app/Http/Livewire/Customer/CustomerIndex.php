<?php

namespace App\Http\Livewire\Customer;

use App\Models\customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerIndex extends Component
{
    use WithPagination;
    public $search,$listCount,$customerId,$customer,$items,$modal=false;
    protected $listeners=['confirmDelete','destroy'];
    protected $rules=[
        'customer.name'=>"required",
        'customer.email'=>"required|email|",
        "customer.phone"=>"required",
        "customer.address"=>"required|min:3"
    ];
    public function mount()
    {
        $this->listCount=10;
    }
    public function modalOff()
    {
        $this->modal=false;
        $this->reset(['customer','customerId']);
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
                customer::where('id',$this->customerId)->update($this->customer->toArray());
            }else{
                customer::create($this->customer);
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
        $this->customerId=$id;
        $this->customer=customer::find($id);
        $this->modalOn();
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            customer::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Success","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.customer.customer-index',['customers'=>customer::where('name','like','%'.$this->search."%")->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
