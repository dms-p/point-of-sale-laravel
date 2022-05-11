<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $category,$categoryId;
    protected $rules=['category.name'=>"required","category.description"=>"required"];
    protected $listeners=['getEdit'];
    public function getEdit($id)
    {
        $this->category=category::find($id);
        $this->categoryId=$id;
    }
    public function update()
    {
        $this->validate();
        try {
            category::find($this->categoryId)->update([
                'name'=>$this->category->name,
                'description'=>$this->category->description
            ]);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success update ". $this->category->name));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps","text"=>$th->getMessage()));
        }
        $this->reset();
        $this->emit('handleStore');
    }
    public function render()
    {
        return view('livewire.categories.category-edit');
    }
}
