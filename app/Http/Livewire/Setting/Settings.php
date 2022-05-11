<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\store;

class Settings extends Component
{
    public $name,$phone,$address,$email,$footer_recipt;
    protected $rules=[
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required|numeric',
        'address'=>'required',
        'footer_recipt'=>'required'
    ];
    public function mount()
    {
        $store=store::find(1);
        $this->name=$store->name;
        $this->email=$store->email;
        $this->phone=$store->phone;
        $this->address=$store->address;
        $this->footer_recipt=$store->footer_recipt;
    }
    public function save()
    {
        $this->validate();
        try {
            store::find(1)->update([
                'name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'address'=>$this->address,
                'footer_recipt'=>$this->footer_recipt
            ]);
            $this->emit('swalAlert',alert("success","Success Update Settings"));
        } catch (\Throwable $th) {
            $this->emit('swalAlert',alert("error",$th->getMessage()));
        }
    }
    public function render()
    {
        return view('livewire.setting.settings');
    }
}
