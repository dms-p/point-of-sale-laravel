<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    public $search='';
    public $listCount,$status;
    public $categoryId;
    protected $listeners=['confirmDelete','destroy','handleStore'];

    public function mount()
    {
        $this->listCount=10;
        $this->status='';
    }
    public function handleStore()
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
            category::destroy($id);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Success","text"=>"Success delete data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.categories.category-index',['categories'=>category::select(['id','name','description'])->where('name','like',"%".$this->search."%")->orderBy('created_at','DESC')->paginate($this->listCount)]);
    }
}
