<?php

namespace App\Http\Livewire\Users;

use App\Helpers\IdTable;
use App\Models\role;
use App\services\userServices;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserCreate extends Component
{
    use WithFileUploads;

    public $genders,$user,$profile;
    protected $rules=[
        'user.name'=>"required|min:3",
        'user.password'=>"required|min:3",
        'user.code'=>"required",
        'user.email'=>"required|email|unique:users,email",
    ];
    public function mount()
    {
        $this->user['code']=IdTable::user();
    }
    public function store(userServices $service)
    {
        $this->validate();
        try {
            $service->store($this->user);
            $this->emit('swalAlert',alert('success','Success create new Cashier'));
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.users.user-create');
    }
}
