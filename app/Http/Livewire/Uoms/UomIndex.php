<?php

namespace App\Http\Livewire\Uoms;

use App\Models\uom;
use Livewire\Component;
use Livewire\WithPagination;

class UomIndex extends Component
{
    use WithPagination;
    public $search,$listCount,$uom,$status;
    protected $rules=['uom.name'=>"required","uom.description"=>"required"];
    protected $listeners=['handleSave','cancel','confirmDelete','destroy'];

    public function mount()
    {
        $this->listCount=10;
        $this->status='';
        $this->search=null;
    }
    public function cancel()
    {
        $this->status='';
    }
    public function handleSave()
    {
        $this->status='';
    }
    public function edit($id)
    {
        $this->status='edit';
        $this->emit('getEdit',$id);
    }
    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['title'=>"Are you sure to delete data?","method"=>"destroy","param"=>$id]);
    }
    public function destroy($id)
    {
        try {
            uom::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.uoms.uom-index',['uoms'=>uom::where('name','like','%'.$this->search."%")->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
