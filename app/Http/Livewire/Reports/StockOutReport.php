<?php

namespace App\Http\Livewire\Reports;

use App\Models\items;
use App\Models\stockOut;
use App\Models\store;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

class StockOutReport extends Component
{
    public $items,$finishDate,$itemId,$startDate,$stocks;
    protected $rules=['finishDate'=>'required','startDate'=>'required'];
    public function mount()
    {
        $this->items=items::all();
    }
    public function find()
    {
        $this->validate();
        $itemId=null;
        if ($this->itemId!==0) {
            $itemId=$this->itemId;
        }
        $this->stocks=stockOut::whereBetween('date',[$this->startDate,$this->finishDate])->when($itemId,function($query) use ($itemId){
            return $query->where('item_id',$itemId);
        })->orderBy('date')->get();
    }
    public function download()
    {
        if ($this->itemId==null) {
            $itemName='Semua';
        }else{
            $itemName=items::select('name')->find($this->itemId);
            $itemName=$itemName->name;
        }
        $store=store::find(1);
        $data=['stocks'=>$this->stocks,'periode'=>$this->startDate.' - '.$this->finishDate,'store'=>$store,'itemName'=>$itemName];
        $pdf = PDF::loadView('pdf.stockOutReport',$data)->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),'stock-out-report-periode '.$data['periode'].' .pdf');
    }
    public function render()
    {
        return view('livewire.reports.stock-out-report');
    }
}
