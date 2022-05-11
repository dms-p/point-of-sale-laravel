<?php

namespace App\Http\Livewire\Sales;

use App\services\CartServices;
use Livewire\Component;

class Discount extends Component
{
    public $key;
    public $valueDiscount;
    protected $listeners=['Discount'];
    protected $rules=['valueDiscount'=>'required'];
    public function mount($key)
    {
        $this->key=$key;

    }
    public function Discount(CartServices $service)
    {
        $this->validate();
        try {
            $service->code=$this->key;
            $discountCondition=$service->conditionAll('discount','promo','-'.$this->valueDiscount,'total');
            $service->addConditionToCart([$discountCondition]);
            $this->emit('modalOff');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.discount');
    }
}
