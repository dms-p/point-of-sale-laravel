<?php

namespace App\Http\Livewire\Cashier\Dashboard;

use App\Models\customer;
use App\Models\items;
use App\Models\sales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardIndex extends Component
{
    public function render()
    {
        return view('livewire.cashier.dashboard.dashboard-index',[
            'totalSales'=>sales::count('id'),
            'totalOwnSales'=>sales::where('user_id',Auth::user()->id)->count('id'),
            'totalCustomer'=>customer::count('id'),
            'totalItem'=>items::count('id'),
            'totalProfit'=>sales::sum('grand_total'),
            'totalOwnProfit'=>sales::where('user_id',Auth::user()->id)->sum('grand_total'),
            'bestSales'=>DB::select("SELECT COUNT(sales.id) as totalSales,SUM(sales.grand_total) as GrandTotal, users.name as name FROM `sales` INNER JOIN users ON sales.user_id=users.id WHERE MONTH(CURDATE())=MONTH(sales.created_at) GROUP by sales.user_id ORDER BY GrandTotal DESC LIMIT 5"),
            'topProduct'=>DB::select("SELECT SUM(item_sales.qty) as qtyItem,items.name as name,items.code as code FROM `item_sales` INNER JOIN items ON items.id=item_sales.item_id WHERE MONTH(CURDATE())=MONTH(item_sales.created_at) GROUP BY item_sales.item_id ORDER by qtyItem DESC LIMIT 5")
        ])->layout('layouts.cashier');
    }
}
