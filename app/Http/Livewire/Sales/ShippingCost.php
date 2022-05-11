<?php

namespace App\Http\Livewire\Sales;

use App\services\CartServices;
use Livewire\Component;

class ShippingCost extends Component
{
    public $key;
    public $valueShippingCost;
    protected $listeners=['ShippingCost'];
    protected $rules=['valueShippingCost'=>'required'];
    public function mount($key)
    {
        $this->key=$key;
    }
    public function ShippingCost(CartServices $service)
    {
        $this->validate();
        try {
            $service->code=$this->key;
            $shippingCostCondition=$service->conditionAll('shipping_cost','shipping','+'.$this->valueShippingCost,'total');
            $service->addConditionToCart([$shippingCostCondition]);
            $this->emit('modalOff');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.shipping-cost');
    }
}
