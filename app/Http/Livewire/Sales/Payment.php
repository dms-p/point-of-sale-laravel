<?php

namespace App\Http\Livewire\Sales;

use App\Models\customer;
use App\Models\sales;
use App\services\CartServices;
use App\services\SalesService;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class Payment extends Component
{
    public $grand_total,$paid,$changes,$note,$customer,$key,$customers;
    protected $listeners=['Payment'];
    public function mount($key)
    {
        $this->customers=customer::all(['id','name']);
        $this->key=$key;
        $this->customer=1;
        $this->changes=0;
        $this->grand_total=round(Cart::session($key)->getTotal());
    }
    public function updatedPaid()
    {
        if (is_numeric($this->paid)) {
            $this->changes=round($this->paid-$this->grand_total);
        }
    }
    public function Payment(SalesService $sales,CartServices $service)
    {
        $this->validate([
            'customer'=>"required",
            "paid"=>"required|integer|gte:".$this->grand_total,
            "changes"=>"required"
        ]);
        $slug=sales::select('slug')->whereCode($this->key)->first();
        $this->emitUp('modalOff');
        $service->code=$this->key;
        $dataSales=['customer'=>$this->customer,'status'=>"success","paid"=>$this->paid,"changes"=>$this->changes,"note"=>$this->note];
        try {
            $sales->save($this->key,$dataSales);
            $this->reset();
            $service->clearCart();
            return redirect()->route('sales.print',$slug['slug']);
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps..!","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.payment');
    }
}
