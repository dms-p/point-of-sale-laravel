<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock-in-report-periode-{{$periode}}</title>
    <style>*{
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
      padding: 5px;
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
        <h3 class="text-center text-uppercase">{{$store->name}}</h1>
        <h1 class="text-center">Laporan Barang Keluar</h1>
        <p class="text-center">Periode : {{$periode}}</p>
        <p class="text-center">Nama Barang : {{$itemName}}</p>
    </header>
    <main>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th class="text-left">Stock In</th>
                    <th class="text-left">Date</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stocks as $stock)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$stock->item->name}}</td>
                        <td>{{$stock->item->code}}</td>
                        <td>{{$stock->qty}} {{$stock->item->uom->name}}</td>
                        <td>{{date_format(date_create($stock->date),'d-m-Y')}}</td>
                        <td style="width: 40%">{{$stock->note}}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Data Not found</td></tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>