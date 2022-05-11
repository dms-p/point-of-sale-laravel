<?php

use App\Http\Controllers\pdf\invoiceController;
use App\Http\Livewire\Brands\BrandIndex;
use App\Http\Livewire\Categories\CategoryIndex;
use App\Http\Livewire\Customer\CustomerIndex;
use App\Http\Livewire\Dashboard\DashboardIndex;
use App\Http\Livewire\Items\ItemCreate;
use App\Http\Livewire\Items\ItemEdit;
use App\Http\Livewire\Items\ItemIndex;
use App\Http\Livewire\Items\ItemShow;
use App\Http\Livewire\Purchase\PurchaseCreate;
use App\Http\Livewire\Purchase\PurchaseIndex;
use App\Http\Livewire\Purchase\PurchaseShow;
use App\Http\Livewire\Purchase\PurchaseEdit;
use App\Http\Livewire\Reports\ItemReport;
use App\Http\Livewire\Reports\PurchaseReport;
use App\Http\Livewire\Reports\SalesReport;
use App\Http\Livewire\Reports\StockInReport;
use App\Http\Livewire\Reports\StockOutReport;
use App\Http\Livewire\Sales\SalesDisplay;
use App\Http\Livewire\Sales\SalesDraft;
use App\Http\Livewire\Sales\SalesIndex;
use App\Http\Livewire\Sales\SalesPrint;
use App\Http\Livewire\Sales\SalesShow;
use App\Http\Livewire\Setting\Settings;
use App\Http\Livewire\StockIn\StockInIndex;
use App\Http\Livewire\StockOut\StockOutIndex;
use App\Http\Livewire\Suppliers\SupplierIndex;
use App\Http\Livewire\Uoms\UomIndex;
use App\Http\Livewire\Users\UserCreate;
use App\Http\Livewire\Users\UserEdit;
use App\Http\Livewire\Users\UserIndex;
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


Route::get('/', DashboardIndex::class)->name('dashboard');
Route::get('/brand', BrandIndex::class)->name('brand.index');
Route::get('/categories', CategoryIndex::class)->name('categories.index');
Route::get('/customer', CustomerIndex::class)->name('customer.index');
Route::get('/stock-in', StockInIndex::class)->name('stockIn.index');
Route::get('/stock-out', StockOutIndex::class)->name('stockOut.index');
Route::get('/supplier', SupplierIndex::class)->name('supplier.index');
Route::get('/uom', UomIndex::class)->name('uom.index');
Route::get('/settings', Settings::class)->name('setting.site');

Route::group(['middleware' => ['can:isAdmin,isOwner'],'prefix'=>"report"], function () {
    Route::get('sales',SalesReport::class)->name('sales.report');
    Route::get('purchase',PurchaseReport::class)->name('purchase.report');
    Route::get('item',ItemReport::class)->name('item.report');
    Route::get('stockIn',StockInReport::class)->name('stockIn.report');
    Route::get('stockOut',StockOutReport::class)->name('stockOut.report');
});
Route::group(['prefix'=>'purchase'],function(){
    Route::get('/', PurchaseIndex::class)->name('purchase.index');
    Route::get('/create', PurchaseCreate::class)->name('purchase.create');
    Route::get('/{purchase}', PurchaseShow::class)->name('purchase.show');
    Route::get('/{purchase}/edit',PurchaseEdit::class)->name('purchase.edit');
});
Route::group(['prefix'=>'sales'],function(){
    Route::get('/', SalesIndex::class)->name('sales.index');
    Route::get('/{sales}/draft', SalesDraft::class)->name('sales.draft');
    Route::get('/display', SalesDisplay::class)->name('sales.display');
    Route::get('/{sales}', SalesShow::class)->name('sales.show');
});
Route::group(['prefix'=>'item'],function(){
    Route::get('/', ItemIndex::class)->name('item.index')->middleware('can:isAdmin');
    Route::get('/create', ItemCreate::class)->name('item.create');
    Route::get('/{item}/show', ItemShow::class)->name('item.show');
    Route::get('/{item}/edit', ItemEdit::class)->name('item.edit');
});
Route::group(['prefix'=>'user'],function(){
    Route::get('/', UserIndex::class)->name('user.index');
    Route::get('/create', UserCreate::class)->name('user.create');
    Route::get('/{user}/edit', UserEdit::class)->name('user.edit');
});
