<?php
namespace App\Http\Livewire\Dashboard;

use App\Models\category;
use App\Models\customer;
use App\Models\items;
use App\Models\purchase;
use App\Models\sales;
use App\Models\supplier;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $typeChart='yearly';
    public $officerCount,$categoriesCount,$topProduct,$itemCount,$salesCount,$profit,$purchase,$purchaseCount,$lastPurchases,$supplierCount,$customerCount,$profitCount,$bestSales,$productAlert,$lastSales,$stockAlert;
    public function mount()
    {
        $this->officerCount=User::count('id');
        $this->purchaseCount=purchase::count('id');
        $this->categoriesCount=category::count('id');
        $this->itemCount=items::count('id');
        $this->salesCount=sales::count('id');
        $this->supplierCount=supplier::count('id');
        $this->customerCount=customer::count('id');
        $this->lastSales=sales::select(['code','grand_total','status','customer_id','user_id'])->with(['customer','user'])->latest()->take(5)->get();
        $this->lastPurchases=purchase::select(['code','grand_total','status','supplier_id','date_required'])->with(['supplier'])->latest()->take(5)->get();
        $this->stockAlert=items::with('uom')->orderBy('qty','asc')->take(5)->get();
        $this->bestSales=DB::select("SELECT COUNT(sales.id) as totalSales,SUM(sales.grand_total) as GrandTotal, users.name as name FROM `sales` INNER JOIN users ON sales.user_id=users.id WHERE MONTH(CURDATE())=MONTH(sales.created_at) GROUP by sales.user_id ORDER BY GrandTotal DESC LIMIT 5");
        $this->profitCount=sales::sum('grand_total');
        $this->topProduct=DB::select("SELECT SUM(item_sales.qty) as qtyItem,items.name as name,items.code as code FROM `item_sales` INNER JOIN items ON items.id=item_sales.item_id WHERE MONTH(CURDATE())=MONTH(item_sales.created_at) GROUP BY item_sales.item_id ORDER by qtyItem DESC LIMIT 5");
        $this->chart();
    }

    public function chart()
    {
        if ($this->typeChart=='monthly') {
            $sales=sales::select(DB::raw('SUM(grand_total) as total,MONTH(created_at) as labels'))->where(DB::raw('YEAR(created_at)'),'=',DB::raw('YEAR(CURDATE())'))->groupBy(DB::raw('MONTH(created_at)'))->get()->toArray();
            $purchases=purchase::select(DB::raw('SUM(grand_total) as total,MONTH(created_at) as labels'))->where(DB::raw('YEAR(created_at)'),'=',DB::raw('YEAR(CURDATE())'))->groupBy(DB::raw('MONTH(created_at)'))->get()->toArray();
        }else{
            $sales=sales::select(DB::raw('SUM(grand_total) as total,year(created_at) as labels'))->groupBy(DB::raw('YEAR(created_at)'))->get()->toArray();
            $purchases=purchase::select(DB::raw('SUM(grand_total) as total,year(created_at) as labels'))->groupBy(DB::raw('YEAR(created_at)'))->get()->toArray();
        }
        $this->charts=$this->getChart($sales,$purchases);
    }
    protected function getChart($sales,$purchases)
    {
        $dataarray=[];
        $i=0;
        foreach ($sales as $sale) {
            $dataarray['total']['sales'][$i]=$sale['total'];
            $dataarray['labels'][$i]=$sale['labels'];
            $i++;
        }
        $i=0;
        foreach ($purchases as $purchase) {
            $dataarray['total']['purchase'][$i]=$purchase['total'];
            $i++;
        }
        return json_encode($dataarray);
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-index');
    }
}
