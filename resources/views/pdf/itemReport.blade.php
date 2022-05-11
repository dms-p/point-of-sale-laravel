<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stock Barang</title>
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
    <h1 class="text-center">Laporan Stock Barang</h1>
    <p class="text-center">Kategori : {{$category}} | Brand : {{$brand}} | Supplier : {{$supplier}}</p>
  </header>
  <main>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th class="text-left">Name</th>
                <th>category</th>
                <th>brand</th>
                <th>Supplier</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td class="text-center">{{$item->code}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">{{$item->category->name}}</td>
                    <td class="text-center">{{$item->brand->name}}</td>
                    <td class="text-center">{{$item->supplier->name}}</td>
                    <td class="text-center">{{$item->cost}}</td>
                    <td class="text-center">{{$item->price}}</td>
                    <td class="text-center">{{$item->qty}} {{$item->uom->name}}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Data Not found</td></tr>
            @endforelse
        </tbody>
    </table>
  </main>
</body>
</html>