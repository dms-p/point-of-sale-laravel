<div class="flex items-start">
    <div class="w-1/3 bg-gradient-to-tr from-gray-800 to-gray-500">
        <div class="min-h-screen px-5 py-10">
            <h1 class="text-2xl tracking-wider text-gray-200">Cart Detail</h1>
            <div class="summaryCart bg-white rounded-lg mt-3 mb-2 shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>price</th>
                            <th>qty</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($carts['items'] as $item)
                            <tr>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['price']}}</td>
                                <td class="p-2 text-center">{{$item['quantity']}}</td>
                                <td class="p-2 text-center">{{$item['price']*$item['quantity']}}</td>
                            </tr>
                            {{$carts}}
                        @empty
                            <tr><td colspan="4">Kosong</td></tr>
                        @endforelse --}}
                        {{$slug}}
                    </tbody>
                </table>
            </div>
            <div class="totals">
                sdas
            </div>
        </div>
    </div>
    <div class="w-2/3"></div>
</div>
