<?php
namespace App\services;

use App\Models\items;
use App\Models\itemSales;
use App\Models\sales;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\DB;

class SalesService
{
    protected function getCostItem($id)
    {
        return items::where('id',$id)->value('cost');
    }
    protected function sales($code,$dataSales)
    {
        $cart=Cart::session($code);
        return [
            'total'=>$cart->getSubTotal(),
            'grand_total'=>$cart->getTotal(),
            'tax'=>str_replace('+','',$cart->getCondition('tax')->getValue()),
            'discount'=>str_replace('-','',$cart->getCondition('discount')->getValue()),
            'shipping_cost'=>str_replace('+','',$cart->getCondition('shipping_cost')->getValue()),
            'customer_id'=>$dataSales['customer'],
            'status'=>$dataSales['status'],
            'paid'=>$dataSales['paid'],
            'changes'=>$dataSales['changes'],
            "note"=>$dataSales['note']
        ];
    }
    protected function salesItems($code)
    {
        $items=null;
        $sales=sales::select('id')->whereCode($code)->first();
        foreach (Cart::session($code)->getContent() as $key => $item) {
            $items[$key]=[
                'sale_id'=>$sales['id'],
                'item_id'=>$item->id,
                'cost'=>$this->getCostItem($item->id),
                'price'=>$item->price,
                'qty'=>$item->quantity,
                'discount'=>str_replace('-','',$item->conditions['discount']->getValue()),
                'tax'=>str_replace('+','',$item->conditions['tax']->getValue()),
                'total'=>$item->getPriceSum(),
                'grand_total'=>$item->getPriceSumWithConditions()
            ];
        }
        return $items;
    }
    public function save($code,$dataSales)
    {
        DB::beginTransaction();
        try {
            sales::whereCode($code)->update($this->sales($code,$dataSales));
            itemSales::insert($this->salesItems($code));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw new \Exception($th->getMessage());
        }
    }
}
