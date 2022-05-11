<?php

namespace App\Http\Livewire\Sales;

use App\services\CartServices;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class EditItem extends Component
{
    public $idItem,$name,$price,$quantity,$discount,$key,$tax;
    protected $listeners=['Edit'];
    protected $rules=[
        'price'=>'required|integer',
        'quantity'=>"required|integer",
        'tax'=>"required",
        'discount'=>"required",
    ];
    public function mount($key,$dataItem)
    {
        $dataItem=Cart::session($key)->get($dataItem);
        $this->key=$key;
        $this->idItem=$dataItem['id'];
        $this->name=$dataItem['name'];
        $this->price=$dataItem['price'];
        $this->quantity=$dataItem['quantity'];
        $this->tax=str_replace('+','',$dataItem->conditions['tax']->getValue());
        $this->discount=str_replace('-','',$dataItem->conditions['discount']->getValue());
    }
    public function Edit(CartServices $service)
    {
        $this->validate();
        $service->key=$this->key;
        $discountCondition=$service->conditionItem('discount-'.$this->idItem,'promo','-'.$this->discount);
        $taxCondition=$service->conditionItem('tax-'.$this->idItem,'tax','+'.$this->tax);
        try {
            Cart::session($this->key)->update($this->idItem,[
                'price'=>$this->price,
                'quantity'=>array(
                    'relative'=>false,
                    'value'=>$this->quantity
                ),
                'conditions'=>[
                    'tax'=>$taxCondition,'discount'=>$discountCondition
                ]
            ]);
            $this->emit('modalOff');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.edit-item');
    }
}
