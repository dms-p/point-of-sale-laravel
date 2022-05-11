<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class SalesDisplay extends Component
{
    protected $listeners=['displayCart'=>'render'];
    public $carts=[
        'totalItem'=>null,
        'subTotal'=>null,
        'total'=>null,
        'discount'=>null,
        'tax'=>null,
        'items'=>null
    ];
    public function render( )
    {
        return view('livewire.sales.sales-display',['slug'=>$id])->layout('layouts.guest');
    }
}
