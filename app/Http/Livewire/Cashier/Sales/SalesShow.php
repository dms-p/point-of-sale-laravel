<?php

namespace App\Http\Livewire\Cashier\Sales;

use App\Models\sales;
use App\Models\store;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class SalesShow extends Component
{
    public $transaction;
    public function mount(sales $sales)
    {
        if (!$sales) {
            abort(404);
        }
        $this->store=store::find(1);
        $this->transaction=$sales;
    }
    public function download()
    {
        $pdf = PDF::loadView('pdf.sale',['sale'=>$this->transaction,'store'=>$this->store])->setPaper('a4', 'potrait')->output();
        return response()->streamDownload(fn()=>print($pdf),$this->transaction['code'].'.pdf');
    }
    public function print($sales)
    {
        return redirect()->route('sales.print',$sales);
    }
    public function render()
    {
        return view('livewire.cashier.sales.sales-show');
    }
}
