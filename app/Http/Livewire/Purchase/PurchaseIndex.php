<?php

namespace App\Http\Livewire\Purchase;

use App\Models\purchase;
use App\Models\supplier;
use Livewire\Component;
use Livewire\WithPagination;

class PurchaseIndex extends Component
{
    use WithPagination;

    public $status=['draft', 'progress', 'uncompleted','completed','cancel'];
    public $statusId,$supplierId,$suppliers,$search,$listCount,$totals;
    protected $listeners=['confirmDelete','destroy'];
    public function mount()
    {
        $purchase=new purchase();
        $this->totals=[
            'all'=>$purchase->count('id'),
            'draft'=>$purchase->whereStatus('draft')->count('id'),
            'progress'=>$purchase->whereStatus('progress')->count('id'),
            'uncompleted'=>$purchase->whereStatus('uncompleted')->count('id'),
            'completed'=>$purchase->whereStatus('completed')->count('id'),
            'cancel'=>$purchase->whereStatus('cancel')->count('id')
        ];
        $this->suppliers=supplier::all(['id','name']);
        $this->listCount=10;
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            purchase::destroy($id);
            $this->emit('swalAlert',alert('success','Success delete data'));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.purchase.purchase-index',[
            'purchases'=>purchase::select(['supplier_id','id','code','grand_total','slug','status','created_at'])->with('supplier')->when($this->statusId,function($query,$statusId){
                $query->where('status',$statusId);
            })->when($this->supplierId,function($query,$supplierId){
                $query->where('supplier_id',$supplierId);
            })->when($this->search,function($query,$search){
                return $query->select('*')->from('purchases')->join('suppliers','purchases.supplier_id','=','suppliers.id')->where('suppliers.name','like','%'.$search.'%');
            })->orderBy('purchases.code','DESC')->paginate($this->listCount)
        ]);
    }
}
