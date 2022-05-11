<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        *{
        padding: 0 auto;
        margin: 0 auto;
        font-family:  Helvetica,Arial,sans-serif;
        }
        body{
            padding: 25px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            font-size: 0.75rem;
        }
        .text-center{
            text-align: center;
        }
        .text-left{
            text-align: left;
        }
        tr th, tr td{
            padding: 10px;
        }
        thead{
            background-color: #dddddd;
        }
        tbody tr:nth-child(odd){
            background-color: #f7f7f7;
        }
        p{
            padding: 5px 0;
        }
        header{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
  <header>
    <h2 class="text-center">{{$store->name}}</h2>
    <h1 class="text-center">Laporan Penjualan</h1>
    <p class="text-center">Periode : {{$periode}} | Status : {{$status}} | Supplier : {{$Seller}}</p>
  </header>
  <main>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th class="text-left">Invoice ID</th>
                <th class="text-left">Seller</th>
                <th class="text-left">Customer</th>
                <th>Total Item</th>
                <th>Tax</th>
                <th>Discount</th>
                <th>Shipping Cost</th>
                <th>Grand total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $sale)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$sale->code}}</td>
                    <td>{{$sale->user->name}}</td>
                    <td>{{$sale->customer->name}}</td>
                    <td class="text-center">{{$sale->itemsales->count()}}</td>
                    <td class="text-center">{{$sale->tax}}</td>
                    <td class="text-center">{{$sale->discount}}</td>
                    <td class="text-center">{{$sale->shipping_cost}}</td>
                    <td class="text-center">{{$sale->grand_total}}</td>
                    <td class="text-center">{{$sale->status}}</td>
                    <td class="text-center">{{date('d-m-Y',strtotime($sale->created_at))}}</td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">Data Not found</td></tr>
            @endforelse
        </tbody>
    </table>
  </main>
</body>
</html>