<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Livewire\Component;

class CategoryCreate extends Component
{
    
    public $category;
    protected $rules=['category.name'=>"required","category.description"=>"required"];
    
    public function store()
    {
        $this->validate();
        try {
            category::create($this->category);
            $this->emit('swalAlert',array("icon"=>"success","title"=>"Yeay!! 🎉","text"=>"Success create data"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',array("icon"=>"error","title"=>"Opps 😭","text"=>$th->getMessage()));
        }
        $this->reset();
        $this->emit('handleStore');
    }
    public function render()
    {
        return view('livewire.categories.category-create');
    }
}
