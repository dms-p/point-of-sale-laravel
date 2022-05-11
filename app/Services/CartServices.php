<?php
namespace App\services;

use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartServices
{
    public $code;
    public function conditionItem($name,$type,$value)
    {
        return new CartCondition(array(
            'name'=>$name,
            'type'=>$type,
            'value'=>$value
        ));
    }
    public function conditionAll($name,$type,$value,$target)
    {
        return new CartCondition(array(
            'name'=>$name,
            'type'=>$type,
            'value'=>$value,
            'target'=>$target
        ));
    }
    public function addConditionToCart($conditions)
    {
        Cart::session($this->code)->condition($conditions);
    }
    public function addCart($data)
    {
        Cart::session($this->code)->add($data);
    }
    public function clearCart()
    {
        Cart::session($this->code)->clear();
        Cart::session($this->code)->clearCartConditions();
        $discountCondition=$this->conditionAll('discount','promo',0,'total');
        $taxCondition=$this->conditionAll('tax','tax',0,'total');
        $shippingCostCondition=$this->conditionAll('shipping_cost','shipping',0,'total');
        $this->addConditionToCart([$discountCondition,$taxCondition,$shippingCostCondition]);
    }
    public function summary()
    {
        $cart=Cart::session($this->code);
        return [
            'subtotal'=>(int) $cart->getSubtotal(),
            'total'=>round($cart->getTotal()),
            'tax'=>$cart->getCondition('tax')->getValue(),
            'shipping_cost'=>$cart->getCondition('shipping_cost')->getValue(),
            'discount'=>$cart->getCondition('discount')->getValue()
        ];
    }
    public function getContent()
    {
        return Cart::session($this->code)->getContent();
    }
}
