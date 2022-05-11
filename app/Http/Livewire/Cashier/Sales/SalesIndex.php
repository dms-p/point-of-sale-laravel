<?php

namespace App\Http\Livewire\Cashier\Sales;


use App\Helpers\IdTable;
use App\Models\items;
use App\Models\itemSales;
use App\Models\sales;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SalesIndex extends Component
{
    use WithPagination;

    public $status=['pending', 'success', 'cancel'];
    public $statusId,$userId,$search,$listCount;
    public $listeners=['cancel','displayCart'];
    public function mount()
    {
        $this->listCount=10;
    }
    public function newSales()
    {
        $newSales=[
            'id'=>IdTable::sales(),
            'slug'=>uniqid("sales"),
            'user_id'=>Auth::user()->id,
            'customer_id'=>1
        ];
        try {
            $sales=sales::create([
                'code'=>IdTable::sales(),
                'slug'=>uniqid("sales"),
                'user_id'=>Auth::user()->id,
                'customer_id'=>1
            ]);
            return redirect()->route('salesCashier.draft',$sales->slug);
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert('error',$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.cashier.sales.sales-index',[
            'sales'=>sales::with('user','customer')->when($this->statusId,function($query,$statusId){
                $query->where('status',$statusId);
            })->when($this->userId,function($query,$userId){
                $query->where('user_id',$userId);
            })->when($this->search,function($query,$search){
                return $query->select('*')->from('sales')->join('customers','sales.customer_id','=','customers.id')->where('customers.name','like','%'.$search.'%');
            })->where('user_id','=',Auth::user()->id)->latest()->paginate($this->listCount)
        ]);
    }
}