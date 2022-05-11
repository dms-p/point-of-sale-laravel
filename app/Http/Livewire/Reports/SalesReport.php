<?php

namespace App\Http\Livewire\Reports;

use App\Models\sales;
use App\Models\store;
use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class SalesReport extends Component
{
    public $status,$sellers,$startDate,$finishDate,$salesStatus,$seller,$sales;
    protected $rules=['startDate'=>'required','finishDate'=>'required'];
    public function mount()
    {
        $this->status=['pending','success','cancel'];
        $this->sellers=User::all(['id','name']);
        $this->sales=[];
    }
    public function find()
    {
        $this->validate();
        $this->sales=sales::whereBetween('updated_at',[$this->startDate,$this->finishDate])->when($this->seller,function($query)
        {
            return $query->where('user_id',$this->seller);
        })->when($this->status,function($query)
        {
            return $query->where('status',$this->status);
        })->orderBy('updated_at','DESC')->get();
    }
    public function download()
    {
        $getSeller=User::select('name')->find($this->seller);
        $pdf = PDF::loadView('pdf.salesReport',[
            'sales'=>$this->sales,
            'store'=>store::find(1),
            'periode'=>$this->startDate.' - '.$this->finishDate,
            'status'=>(empty($this->salesStatus)) ? 'Semua' : $this->salesStatus,
            'Seller'=>(empty($getSeller)) ? 'Semua' : $getSeller->name
            ])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn()=>print($pdf),'sales-report.pdf');
    }
    public function render()
    {
        return view('livewire.reports.sales-report');
    }
}
