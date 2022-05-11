<?php

namespace App\Http\Livewire\Cashier\Sales;

use App\Models\items;
use App\Models\sales;
use App\Models\store;
use App\services\CartServices;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class SalesDraft extends Component
{
    public $sales,$code,$key,$dataItem,$slug;
    public $dataCart=[];
    public $modal=false;
    public $componentModal=null;
    protected $listeners=['modalOff','remove','confirmRemove','confirmClear','Clear'];
    public function mount(sales $sales,CartServices $service)
    {
        $this->dataItem=null;
        if ($sales==null) {
            return redirect()->route('salesCashier.index');
        }
        $this->sales=$sales;
        $this->key=$sales->code;
        $service->code=$sales->code;
        if (!empty($sales->itemSales)) {
            foreach ($sales->itemSales as $key => $item) {
                $taxCondition=$service->conditionItem('tax-'.$item->item_id,'tax','+'.$item->tax);
                $discountCondition=$service->conditionItem('discount-'.$item->item_id,'promo','-'.$item->discount);
                $service->addCart([
                    'id'=>$item->item_id,
                    'name'=>$item->item->name,
                    'price'=>(int) $item->price,
                    'quantity'=>(int) $item->qty,
                    'conditions'=>['discount'=>$discountCondition,'tax'=>$taxCondition]
                ]);
            }
        }
        $discountCondition=$service->conditionAll('discount','promo','-'.$sales['discount'],'total');
        $taxCondition=$service->conditionAll('tax','tax','+'.$sales['tax'],'total');
        $shippingCostCondition=$service->conditionAll('shipping_cost','shipping','+'.$sales['shipping_cost'],'total');
        $service->addConditionToCart([$discountCondition,$taxCondition,$shippingCostCondition]);
    }
    public function addItem(CartServices $service)
    {
        $item=items::select('id','name','price')->whereCode($this->code)->first();
        $service->code=$this->key;
        if (!$item) {
            $this->emit('swalAlert',alert('error','Item Not Found!'));
        }else{
            if (!empty(Cart::session($this->key)->get($item->id))) {
                Cart::session($this->key)->update($item->id,['quantity'=>1]);
            } else {
                $discountCondition=$service->conditionItem('discount-'.$item->id,'promo',0);
                $taxCondition=$service->conditionItem('tax-'.$item->id,'tax',0);
                $service->addCart([
                    'id'=>$item->id,
                    'name'=>$item->name,
                    'price'=>$item->price,
                    'quantity'=>1,
                    'conditions'=>[
                        'tax'=>$taxCondition,'discount'=>$discountCondition
                    ]
                ]);
            }
            $this->reset('code');
        }
    }
    public function confirmRemove($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to remove item ?","method"=>"remove","param"=>$id]);
    }
    public function remove($id)
    {
        try {
            Cart::session($this->key)->remove($id);
            $this->emit('swalAlert',alert('success','Success delete data'));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function confirmClear()
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to Clear item ?","method"=>"Clear"]);
    }
    public function Clear(CartServices $service)
    {
        try {
            $service->code=$this->key;
            $service->clearCart();
            $this->emit('swalAlert',alert('success','Success Clear data'));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render(CartServices $service)
    {
        $service->code=$this->key;
        return view('livewire.cashier.sales.sales-draft',[
            'carts'=>$service->getContent(),
            'store'=>store::select('name')->find(1),
            'summary'=>$service->summary()
        ])->layout('layouts.cashier');
    }
    public function openEdit($id)
    {
        $this->modal=true;
        $this->dataItem=$id;
        $this->componentModal='Edit';
    }
    public function openSave()
    {
        $this->modal=true;
        $this->componentModal='Save';
    }
    public function openTax()
    {
        $this->modal=true;
        $this->componentModal='Tax';
    }
    public function openDiscount()
    {
        $this->modal=true;
        $this->componentModal='Discount';
    }
    public function openShippingCost()
    {
        $this->modal=true;
        $this->componentModal='ShippingCost';
    }
    public function openPayment()
    {
        $this->modal=true;
        $this->componentModal='Payment';
    }
    public function modalOff()
    {
        $this->modal=false;
        $this->reset(['componentModal','dataItem']);
    }
}
