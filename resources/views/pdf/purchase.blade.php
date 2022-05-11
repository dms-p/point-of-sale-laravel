<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Purchase of {{$purchase->code}}</title>
    <style>
        body{
            font-family: 'Raleway', sans-serif;
            color: #252f3f;
        }
        .header{
            width: 100%;
            margin-bottom: 3rem;
        }
        .header h1{
            float: left;
        }
        .header table{
            font-size: 10pt;
            float: right;
        }
        .header table th{
            text-align: right;
        }
        #from,#to{
            width: 50%;
        }
        #from{
            float: left;
        }
        #to{
            float: right;
        }
        .table{
            width: 100%;
            margin-top:40px;
            border-collapse: collapse;
            font-size: 11pt;
        }
        .no-border{
            border: none;
        }
        th,td{
            padding:10px;
        }
        thead {
            background-color:#d2d6dc;
        }
        tbody td,tfoot th{
            padding: 5px 10px;
            border-bottom:1px solid rgba(229, 231, 235, .5);
        }
        .text-left{
            text-align: left;
        }
        .text-italic{
            font-style:italic;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .text-secondary{
            color: #4b5563;
        }
        .font-semibold{
            font-weight: 700;
        }
        .font-sm{
            font-size: 10pt;
        }
        p{
            padding: 0;
            margin: 0;
        }
        tfoot td{
            border: none;
        }
        .text-indigo{
            color:rgba(104, 117, 245, .5);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="font-italic">PURCHASE ORDER</h1>
        <table>
            <tr>
                <th>No. Reference :</th>
                <td class="no-border text-secondary">{{$purchase->code}}</td>
            </tr>
            <tr>
                <th>Date Required:</th>
                <td class="no-border text-secondary">{{date('d F Y',strtotime($purchase->date_required))}}</td>
            </tr>
            <tr>
                <th>Status :</th>
                <td class="no-border text-secondary">{{$purchase->status}}</td>
            </tr>
        </table>
        <div style="clear: both"></div>
    </div>
    <div class="address">
        <div id="from">
            <span>From :</span>
            <p class="font-semibold">{{$store->name}}</p>
            <p class="text-secondary font-sm">{{$store->address}}</p>
            <p class="text-secondary font-sm">Email : {{$store->email}}</p>
            <p class="text-secondary font-sm">Telp : {{$store->phone}}</p>
        </div>
        <div id="to">
            <span>To :</span>
            <p class="font-semibold">{{$purchase->supplier->name}}</p>
            <p class="text-secondary font-sm">{{$purchase->supplier->address}}</p>
            <p class="text-secondary font-sm">Email : {{$purchase->supplier->email}}</p>
            <p class="text-secondary font-sm">Telp : {{$purchase->supplier->phone}}</p>
        </div>
        <div style="clear: both"></div>
    </div>
    <table class="table">
        <thead>
            <tr class="bg-gray-300 text-gray-800">
                <th class="text">No</th>
                <th class=" text-left">Product Name</th>
                <th class="">Price</th>
                <th class="">Qty</th>
                <th class="">Discount</th>
                <th class="">Tax</th>
                <th class="">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchase->itemPurchases as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="text-left">{{$loop->iteration}}</td>
                    <td>
                        <p>{{$item->item->name}}</p>
                        <span class="font-sm text-indigo">{{$item->item->code}}</span>
                    </td>
                    <td class=" text-center">{{$item->cost}}</td>
                    <td class=" text-center">{{$item->qty}}</td>
                    <td class=" text-center">{{$item->discount}}</td>
                    <td class=" text-center">{{$item->tax}}</td>
                    <td class=" text-center">{{$item->grand_total}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right">Sub Total</td>
                <th>{{$purchase->total}}</th>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Tax</td>
                <th>{{$purchase->tax}}</th>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Discount</td>
                <th>{{$purchase->discount}}</th>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Shipping Cost</td>
                <th>{{$purchase->shipping_cost}}</th>
            </tr>
            <tr>
                <td colspan="6" class="text-right">Grand Total</td>
                <th>{{$purchase->grand_total}}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>