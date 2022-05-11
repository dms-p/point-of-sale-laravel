<?php

use App\Http\Controllers\pdf\invoiceController;
use App\Http\Livewire\RegisterShop;
use App\Http\Livewire\Sales\SalesPrint;
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


route::group(['middleware'=>'mustHasShop'],function(){
    Route::get('/',function()
    {
        return redirect()->route('login');
    });
});
Route::get('/register-shop',RegisterShop::class)->name('register.shop');
Route::get('/pdf/{sales}', invoiceController::class)->name('pdf.invoice');
Route::group(['prefix' => 'print'], function () {
    Route::get('sales/{sales}',SalesPrint::class)->name('sales.print');
});
