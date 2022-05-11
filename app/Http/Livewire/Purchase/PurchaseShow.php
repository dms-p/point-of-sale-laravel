<?php

namespace App\Http\Livewire\Purchase;

use App\Models\purchase;
use App\Models\store;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

class PurchaseShow extends Component
{
    public $purchase,$store;
    
    public function mount(purchase $purchase)
    {
        if (!$purchase) {
            abort(404);
        }
        $this->store=store::find(1);
        $this->purchase=$purchase;
    }
    public function download()
    {
        $pdf = PDF::loadView('pdf.purchase',['purchase'=>$this->purchase,'store'=>$this->store])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),$this->purchase['code'].'.pdf');
    }
    public function render()
    {
        return view('livewire.purchase.purchase-show');
    }
}
