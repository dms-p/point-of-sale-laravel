<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    public $listCount;
    public $keyword;
    public function mount()
    {
        $this->listCount=10;
    }
    public function render()
    {
        return view('livewire.users.user-index',['users'=>User::select(['name','email','id','code','role_id'])->with('role')->where('name','like',"%".$this->keyword."%")->orWhere('email','like',"%".$this->keyword."%")->paginate($this->listCount)]);
    }
}
