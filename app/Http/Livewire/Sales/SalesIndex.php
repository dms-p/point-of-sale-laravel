<?php

namespace App\Http\Livewire\Sales;

use App\Helpers\IdTable;
use App\Models\items;
use App\Models\itemSales;
use App\Models\sales;
use App\Models\User;
use App\services\CartServices;
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
    public $statusId,$userId,$users,$search,$listCount,$totalSales,$totalSuccess,$totalPending;
    protected $listeners=['confirmDelete','destroy'];
    public function mount()
    {
        $this->users=User::all();
        $sales=new sales();
        $this->totalSales=$sales->count('id');
        $this->totalSuccess=$sales->whereStatus('success')->count('id');
        $this->totalPending=$sales->whereStatus('pending')->count('id');
        $this->listCount=10;
    }
    public function newSales()
    {
        try {
            $sales=sales::create([
                'code'=>IdTable::sales(),
                'slug'=>uniqid("sales"),
                'user_id'=>Auth::user()->id,
                'customer_id'=>1
            ]);
            return redirect()->route('sales.draft',$sales->slug);
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert('error',$th->getMessage()));
        }
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            sales::destroy($id);
            itemSales::where('sale_id',$id)->delete();
            $this->emit('swalAlert',alert('success','Success delete data'));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.sales.sales-index',[
            'sales'=>sales::with('user','customer')->when($this->statusId,function($query,$statusId){
                $query->where('status',$statusId);
            })->when($this->userId,function($query,$userId){
                $query->where('user_id',$userId);
            })->when($this->search,function($query,$search){
                return $query->select('*')->from('sales')->join('customers','sales.customer_id','=','customers.id')->where('customers.name','like','%'.$search.'%');
            })->latest()->paginate($this->listCount)
        ]);
    }
}
