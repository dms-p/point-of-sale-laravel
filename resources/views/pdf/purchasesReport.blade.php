<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian</title>
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
    <h1 class="text-center">Laporan Pembelian</h1>
    <p class="text-center">Periode : {{$periode}} | Status : {{$status}} | Supplier : {{$supplier}}</p>
  </header>
  <main>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th class="text-left">Purchases ID</th>
                <th class="text-left">Supplier</th>
                <th>Total Item</th>
                <th>Tax</th>
                <th>Discount</th>
                <th>Shipping Cost</th>
                <th>Grand total</th>
                <th>Status</th>
                <th>Date Required</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($purchases as $purchase)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$purchase->code}}</td>
                    <td>{{$purchase->supplier->name}}</td>
                    <td class="text-center">{{$purchase->itemPurchases->count()}}</td>
                    <td class="text-center">{{$purchase->tax}}</td>
                    <td class="text-center">{{$purchase->discount}}</td>
                    <td class="text-center">{{$purchase->shipping_cost}}</td>
                    <td class="text-center">{{$purchase->grand_total}}</td>
                    <td class="text-center">{{$purchase->status}}</td>
                    <td class="text-center">{{date('d-m-y',strtotime($purchase->date_required))}}</td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">Data Not found</td></tr>
            @endforelse
        </tbody>
    </table>
  </main>
</body>
</html>