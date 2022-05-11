<?php

namespace App\Http\Livewire\Sales;

use App\Models\sales;
use App\Models\store;
use Livewire\Component;

class SalesPrint extends Component
{
    public $sales;
    public function mount(sales $sales)
    {
        if (!$sales) {
            abort(404);
        }
        $this->sales=$sales;
        $this->store=store::find(1);
    }
    public function print()
    {
        $this->emit('print');
    }
    public function render()
    {
        return view('livewire.sales.sales-print')->layout('print.sales');
    }
}
