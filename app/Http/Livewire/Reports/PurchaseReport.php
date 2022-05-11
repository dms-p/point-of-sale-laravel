<?php

namespace App\Http\Livewire\Reports;

use App\Models\purchase;
use App\Models\store;
use App\Models\supplier;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class PurchaseReport extends Component
{
    public $status,$suppliers,$purchases,$startDate,$finishDate,$purchaseStatus,$supplierId;
    public function mount()
    {
        $this->suppliers=supplier::all(['id','name']);
        $this->status=['draft','progress','uncompleted','complete'];
    }
    public function find()
    {
        $this->purchases=purchase::whereBetween('updated_at',[$this->startDate,$this->finishDate])->when($this->supplierId,function($query)
        {
            return $query->where('supplier_id',$this->supplierId);
        })->when($this->purchaseStatus,function($query)
        {
            return $query->where('status',$this->purchaseStatus);
        })->orderBy('updated_at','DESC')->get();
    }
    public function download()
    {
        $getSupplier=supplier::select('name')->find($this->supplierId);

        $pdf = PDF::loadView('pdf.purchasesReport',[
            'purchases'=>$this->purchases,
            'store'=>store::find(1),
            'periode'=>$this->startDate.' - '.$this->finishDate,
            'status'=>(empty($this->purchaseStatus)) ? 'Semua' : $this->purchaseStatus,
            'supplier'=>(empty($getSupplier)) ? 'Semua' : $getSupplier->name
            ])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),'purchases-report.pdf');
    }
    public function render()
    {
        return view('livewire.reports.purchase-report');
    }
}
