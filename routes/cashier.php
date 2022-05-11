<?php

use App\Http\Livewire\Cashier\Customer\CustomerIndex;
use App\Http\Livewire\Cashier\Dashboard\DashboardIndex;
use App\Http\Livewire\Cashier\Items\ItemIndex;
use App\Http\Livewire\Cashier\Items\ItemShow;
use App\Http\Livewire\Cashier\Sales\SalesDraft;
use App\Http\Livewire\Cashier\Sales\SalesIndex;
use App\Http\Livewire\Cashier\Sales\SalesShow;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', DashboardIndex::class)->name('dashboard.cashier');
Route::group(['prefix'=>'sales'],function(){
    Route::get('/',SalesIndex::class)->name('salesCashier.index');
    Route::get('/{sales}',SalesShow::class)->name('salesCashier.show');
    Route::get('/{sales}/draft',SalesDraft::class)->name('salesCashier.draft');
});
Route::group(['prefix'=>'item'],function(){
    Route::get('/',ItemIndex::class)->name('itemCashier.index');
    Route::get('/{item}',ItemShow::class)->name('itemCashier.show');
});
Route::get('/customer', CustomerIndex::class)->name('customerCashier.index');