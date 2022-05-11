<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\sales;
use Barryvdh\DomPDF\Facade as PDF;

class invoiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(sales $sales)
    {
        $data['sales']=$sales;
        $pdf=PDF::loadView('pdf.sales',$data);
        return $pdf->download('invoice_.pdf');
    }
}
