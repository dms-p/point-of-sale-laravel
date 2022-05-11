<?php

namespace App\Http\Livewire\Sales;

use App\Models\customer;
use App\Models\sales;
use App\services\CartServices;
use App\services\SalesService;
use Livewire\Component;

class Save extends Component
{
    public $note,$customer,$key,$customers;
    protected $listeners=['Save'];
    public function mount($key)
    {
        $this->key=$key;
        $this->customer=1;
        $this->customers=customer::all(['id','name']);
    }
    public function Save(SalesService $sales,CartServices $service)
    {
        $this->validate([
            'customer'=>"required",
            'note'=>"required"
        ]);
        $dataSales=['customer'=>$this->customer,'status'=>"pending","paid"=>0,"changes"=>0,"note"=>$this->note];
        $service->code=$this->key;
        try {
            $sales->save($this->key,$dataSales);
            $service->clearCart();
            $this->reset();
            $this->emitUp('modalOff');
            $this->emit('swalAlert',array('icon'=>"success","title"=>"Yeay!!","text"=>"Success save transaction"));
            return redirect()->route('sales.index');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps..!","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.save');
    }
}
