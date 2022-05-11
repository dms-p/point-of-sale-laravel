<?php
namespace App\services;

use App\Models\itemPurchase;
use App\Models\items;
use App\Models\itemSales;
use App\Models\purchase;
use App\Models\sales;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    protected function purchaseData($dataPurchase)
    {
        
        $cart=Cart::session($dataPurchase['code']);
        return [
            'total'=>$cart->getSubtotal(),
            'grand_total'=>$cart->getTotal(),
            'tax'=>$dataPurchase['tax'],
            'discount'=>$dataPurchase['discount'],
            'supplier_id'=>$dataPurchase['supplier_id'],
            'status'=>$dataPurchase['status'],
            'code'=>$dataPurchase['code'],
            'slug'=>$dataPurchase['slug'],
            "user_id"=>Auth::user()->id,
            "date_required"=>$dataPurchase['date_required'],
            "shipping_cost"=>$dataPurchase['shipping_cost'],
            "note"=>$dataPurchase['note']
        ];
    }
    protected function getItemPurchase($code,$id){
        $carts=Cart::session($code)->getContent();
        $itemPurchase=array();
        $i=0;
        foreach ($carts as $key => $cart) {
            $itemPurchase[$i]=[
                'item_id'=>$cart->id,
                'qty'=>$cart->quantity,
                'purchase_id'=>$id,
                'cost'=>$cart->price,
                'tax'=>str_replace('+','',$cart->conditions['tax']->getValue()),
                'discount'=>str_replace('-','',$cart->conditions['discount']->getValue()),
                'total'=>$cart->getPriceSumWithConditions(),
                'grand_total'=>$cart->getPriceSumWithConditions()
            ];
            $i++;
        }
        return $itemPurchase;
    }
    public function save($dataPurchase)
    {
        DB::beginTransaction();
        try {
            $purchase=purchase::create($this->purchaseData($dataPurchase));
            itemPurchase::insert($this->getItemPurchase($dataPurchase['code'],$purchase->id));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage());
        }
    }
    public function update($idPurchase,$dataPurchase)
    {
        DB::beginTransaction();
        try {
            itemPurchase::where('purchase_id',$idPurchase)->delete();
            itemPurchase::insert($this->getItemPurchase($dataPurchase['code'],$idPurchase));
            purchase::find($idPurchase)->update($this->purchaseData($dataPurchase));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage());
        }
    }
}
