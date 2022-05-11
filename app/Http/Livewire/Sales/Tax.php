<?php

namespace App\Http\Livewire\Sales;

use App\services\CartServices;
use Livewire\Component;

class Tax extends Component
{
    public $key;
    public $valueTax;
    protected $listeners=['Tax'];
    protected $rules=['valueTax'=>'required'];
    public function mount($key)
    {
        $this->key=$key;
    }
    public function Tax(CartServices $service)
    {
        $this->validate();
        try {
            $service->code=$this->key;
            $taxCondition=$service->conditionAll('tax','tax','+'.$this->valueTax,'total');
            $service->addConditionToCart([$taxCondition]);
            $this->emit('modalOff');
        } catch (\Throwable $th) {
            $this->emit('alert',$th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.sales.tax');
    }
}
