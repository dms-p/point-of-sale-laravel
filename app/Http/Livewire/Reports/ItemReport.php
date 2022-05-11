<?php

namespace App\Http\Livewire\Reports;

use App\Models\brand;
use App\Models\category;
use App\Models\items;
use App\Models\store;
use App\Models\supplier;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

class ItemReport extends Component
{
    public $suppliers,$categories,$brands,$brandId,$categoryId,$supplierId,$items;
    public function mount()
    {
        $this->suppliers=supplier::all(['id','name']);
        $this->categories=category::all(['id','name']);
        $this->brands=brand::all(['id','name']);
    }
    public function find()
    {
        $this->items=items::with(['category','brand','supplier','uom'])->when($this->categoryId,function($query){
            return $query->where('category_id',$this->categoryId);
        })->when($this->brandId,function($query){
            return $query->where('brand_id',$this->brandId);
        })->when($this->supplierId,function($query){
            return $query->where('supplier_id',$this->supplierId);
        })->orderBy('qty','DESC')->get();
    }
    public function download()
    {
        $getBrand=brand::select('name')->find($this->brandId);
        $getSupplier=supplier::select('name')->find($this->supplierId);
        $getCategory=category::select('name')->find($this->categoryId);
        $pdf = PDF::loadView('pdf.itemReport',[
            'items'=>$this->items,
            'store'=>store::find(1),
            'brand'=>(empty($getBrand)) ? 'Semua' : $getBrand->name,
            'category'=>(empty($getCategory)) ? 'Semua' : $getCategory->name,
            'supplier'=>(empty($getSupplier)) ? 'Semua' : $getSupplier->name
            ])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),'item-report.pdf');
    }
    public function render()
    {
        return view('livewire.reports.item-report');
    }
}
