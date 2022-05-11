<?php

namespace App\Http\Livewire\Purchase;

use App\Models\items;
use App\Models\purchase;
use App\Models\supplier;
use App\services\CartServices;
use App\services\PurchaseService;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class PurchaseEdit extends Component
{
    public $purchase,$suppliers,$status,$items,$modal,$itemId,$singleItem,$purchaseId;
    protected $listeners=['cart','confirmRemove','remove','confirmClear','Clear'];
    protected $rules=[
        'purchase.code'=>'required',
        'purchase.supplier_id'=>'required',
        'purchase.date_required'=>'required',
        'purchase.status'=>'required',
        'purchase.note'=>'required',
        'purchase.tax'=>'required',
        'purchase.discount'=>'required',
        'purchase.shipping_cost'=>'required',
    ];
    public function mount(purchase $purchase,CartServices $service)
    {
        $this->suppliers=supplier::all(['id','name']);
        $this->status=['draft', 'progress', 'uncompleted','completed','cancel'];
        $this->items=items::all(['id','name']);
        $this->purchase=$purchase;
        $this->purchaseId=$purchase['id'];
        $this->modal=false;
        $service->code=$this->purchase['code'];
        $service->clearCart();
        foreach ($purchase->itemPurchases as $key => $item) {
            $taxCondition=$service->conditionItem('tax-'.$item->item_id,'tax','+'.$item->tax);
            $discountCondition=$service->conditionItem('discount-'.$item->item_id,'promo','-'.$item->discount);
            $service->addCart([
                'id'=>$item->item_id,
                'name'=>$item->item->name,
                'price'=>(int) $item->cost,
                'quantity'=>(int)$item->qty,
                'conditions'=>['discount'=>$discountCondition,'tax'=>$taxCondition]
            ]);
        }
    }
    public function save(PurchaseService $service,CartServices $cartServices)
    {
        $this->validate();
        try {
            $service->update($this->purchaseId,$this->purchase);
            $this->emit('swalAlert',alert("success",'success'));
            $cartServices->code=$this->purchase['code'];
            $cartServices->clearCart();
            return redirect()->route('purchase.show',$this->purchase->slug);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function addItem(CartServices $service)
    {
        $this->validate(['itemId'=>'required']);
        $item=items::find($this->itemId);
        $service->code=$this->purchase['code'];
        if (!empty(Cart::session($this->purchase['code'])->get($item->id))) {
            Cart::session($this->purchase['code'])->update($item->id,['quantity'=>1]);
        } else {
            $discountCondition=$service->conditionItem('discount-'.$item->id,'promo',0);
            $taxCondition=$service->conditionItem('tax-'.$item->id,'tax',0);
            $service->addCart([
                'id'=>$item->id,
                'name'=>$item->name,
                'price'=>$item->cost,
                'quantity'=>1,
                'conditions'=>['discount'=>$discountCondition,'tax'=>$taxCondition]
            ]);
        }
        
        $this->reset(['itemId']);
    }
    public function confirmRemove($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to remove item ?","method"=>"remove","param"=>$id]);
    }
    public function remove($id)
    {
        try {
            Cart::session($this->purchase['code'])->remove($id);
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
            $service->code=$this->purchase['code'];
            $service->clearCart();
            $this->emit('swalAlert',alert('success','Success Clear data'));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function modalOff()
    {
        $this->reset('singleItem');
        $this->modal=false;
    }
    public function edit($id)
    {
        $getCart=Cart::session($this->purchase['code'])->get($id);
        $this->singleItem=$getCart;
        $this->singleItem['tax']=str_replace('+','',$getCart->conditions['tax']->getValue());
        $this->singleItem['discount']=str_replace('-','',$getCart->conditions['discount']->getValue());
        $this->modal=true;
    }
    public function update(CartServices $service)
    {
        $this->validate([
            'singleItem.id'=>'required',
            'singleItem.name'=>'required',
            'singleItem.quantity'=>'required|integer|min:1',
            'singleItem.tax'=>'required',
            'singleItem.discount'=>'required',
            'singleItem.price'=>'required|integer'
        ]);
        try {
            $service->code=$this->purchase['code'];
            $discountCondition=$service->conditionItem('discount-'.$this->singleItem['id'],'promo','-'.$this->singleItem['discount']);
            $taxCondition=$service->conditionItem('tax-'.$this->singleItem['id'],'tax','+'.$this->singleItem['tax']);
            CART::session($this->purchase['code'])->update($this->singleItem['id'],[
                'name'=>$this->singleItem['name'],
                'quantity'=>[
                    'relative'=>false,
                    'value'=>$this->singleItem['quantity']
                ],
                'price'=>$this->singleItem['price'],
                'id'=>$this->singleItem['id'],
                'conditions'=>[
                    'tax'=>$taxCondition,'discount'=>$discountCondition
                ]
            ]);
            $this->modalOff();
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render(CartServices $service)
    {
        $service->code=$this->purchase['code'];
        $discountCondition=$service->conditionAll('discount','promo','-'.$this->purchase['discount'],'total');
        $taxCondition=$service->conditionAll('tax','tax','+'.$this->purchase['tax'],'total');
        $shippingCostCondition=$service->conditionAll('shipping_cost','shipping','+'.$this->purchase['shipping_cost'],'total');
        $service->addConditionToCart([$discountCondition,$taxCondition,$shippingCostCondition]);
        return view('livewire.purchase.purchase-edit',[
            'carts'=>$service->getContent(),
            'summary'=>$service->summary()
        ]);
    }
}
