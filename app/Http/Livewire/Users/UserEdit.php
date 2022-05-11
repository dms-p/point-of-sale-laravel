<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\services\userServices;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public $genders,$user,$profile,$userId;
    protected $rules=[
        'user.name'=>"",
        'user.password'=>"",
        'user.code'=>"",
        'user.email'=>"",
    ];
    public function mount(User $user)
    {
        $this->genders=['male','female'];
        $this->user=$user;
        $this->userId=$user->id;
    }
    public function store()
    {
        $this->validate([
            'user.name'=>"required|min:3",
            'user.code'=>"required",
            'user.email'=>"required|email|unique:users,email,".$this->userId,
        ]);
        try {
            if (!empty($this->user['password'])) {
                $user=[
                    'name'=>$this->user['name'],
                    'password'=>Hash::make($this->user['password']),
                    'code'=>$this->user['code'],
                    'email'=>$this->user['email']
                ];
            }else{
                $user=[
                    'name'=>$this->user['name'],
                    'code'=>$this->user['code'],
                    'email'=>$this->user['email']
                ];
            }
            User::find($this->userId)->update($user);
            $this->emit('swalAlert',alert('success','Success create new Cashier'));
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.users.user-edit')->layout('layouts.admin');
    }
}
