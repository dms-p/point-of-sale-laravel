<?php

namespace App\Http\Livewire;

use App\Models\store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterShop extends Component
{
    public $name,$email,$password,$passwordConfirmation,$nameStore,$phone,$emailStore,$address;
    protected $rules=[
        'name'=>'required|min:3',
        'email'=>'required|email',
        'password'=>'required|min:3',
        'passwordConfirmation'=>'required|same:password',
        'nameStore'=>'required|min:3',
        'phone'=>'required',
        'emailStore'=>'required|email',
        'address'=>'required|min:3',
    ];
    public function save(){
        $this->validate();
        DB::beginTransaction();
        try {
            store::create([
                'name'=>$this->nameStore,
                'phone'=>$this->phone,
                'email'=>$this->emailStore,
                'address'=>$this->address
            ]);
            User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'role_id'=>1,
                'password'=>Hash::make($this->password)
            ]);
            DB::commit();
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('swalAlert',["icon"=>"error","title"=>"Opps","text"=>$th->getMessage()]);
        }
    }
    public function render()
    {
        return view('livewire.register-shop')->layout('layouts.guest2');
    }
}
