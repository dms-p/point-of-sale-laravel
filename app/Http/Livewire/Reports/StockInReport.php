<?php

namespace App\Http\Livewire\Reports;

use App\Models\items;
use App\Models\stockIn;
use App\Models\store;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class StockInReport extends Component
{
    public $items,$finishDate,$itemId,$startDate,$stocks;
    protected $rules=['finishDate'=>'required','startDate'=>'required'];
    public function mount()
    {
        $this->items=items::all(['id','name']);
    }
    public function find()
    {
        $this->validate();
        $itemId=null;
        if ($this->itemId!==0) {
            $itemId=$this->itemId;
        }
        $this->stocks=stockIn::whereBetween('date',[$this->startDate,$this->finishDate])->when($itemId,function($query) use ($itemId){
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
        $pdf = PDF::loadView('pdf.stockInReport',$data)->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),'stock-in-report-periode '.$data['periode'].' .pdf');
    }
    public function render()
    {
        return view('livewire.reports.stock-in-report');
    }
}
