<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Purchase Order #{{$purchase->code}}</h1>
        <div class="inline-flex justify-center">
            <button wire:click="download" wire:loading.attr="disabled" wire:target="download" class="btn btn-red">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg> Download as PDF
            </button>
        </div>
    </header>
    <main>
        <div class="bg-white pt-4 pb-8 py-5 sm:p-8 rounded-md shadow overflow-hidden sm:rounded-md w-full">
            <div id="title" class="grid grid-cols-2 grid-rows-1 gap-3">
                <h1 class="text-3xl italic text-gray-800 uppercase font-bold">Purchase Order</h1>
                <table>
                    <tr>
                        <th class="text-right">No. Reference :</th>
                        <td class="text-right w-40">{{$purchase->code}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Date :</th>
                        <td class="text-right w-40">{{date('d F Y',strtotime($purchase->date_required))}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Status :</th>
                        <td class="text-right w-40">{{$purchase->status}}</td>
                    </tr>
                </table>
            </div>
            <div class="grid sm:grid-cols-2 mt-4 mb-8 grid-cols-1 grid-rows-2 sm:grid-rows-1 gap-9">
                <div class="p-6" id="from">
                    <span class="font-semibold">From :</span>
                    <p class="text-xl font-semibold">{{$store->name}}</p>
                    <p class="mt-2 text-gray-600">{{$store->address}}</p>
                    <p class="text-gray-600">Email : {{$store->email}}</p>
                    <p class="text-gray-600">Telp : {{$store->phone}}</p>
                </div>
                <div class="p-6" id="to">
                    <span class="font-semibold">To :</span>
                    <p class="text-xl font-semibold">{{$purchase->supplier->name}}</p>
                    <p class="mt-2 text-gray-600">{{$purchase->supplier->address}}</p>
                    <p class="text-gray-600">Email : {{$purchase->supplier->email}}</p>
                    <p class="text-gray-600">Telp : {{$purchase->supplier->phone}}</p>
                </div>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-300 text-gray-800">
                        <th class="p-2">No</th>
                        <th class="p-2 text-left">Product Name</th>
                        <th class="p-2">Unit Price</th>
                        <th class="p-2">Qty</th>
                        <th class="p-2">Tax</th>
                        <th class="p-2">Discount</th>
                        <th class="p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase->itemPurchases as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="p-2 text-center">{{$loop->iteration}}</td>
                            <td class="p-2">
                                <p>{{$item->item->name}}</p>
                                <span class="text-indigo-500 text-xs tracking-wide">{{$item->item->code}}</span>
                            </td>
                            <td class="p-2 text-center">{{$item->cost}}</td>
                            <td class="p-2 text-center">{{$item->qty}}</td>
                            <td class="p-2 text-center">{{$item->discount}}</td>
                            <td class="p-2 text-center">{{$item->tax}}</td>
                            <td class="p-2 text-center">{{$item->grand_total}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="p-2 text-right" colspan="6">Sub Total</td>
                        <th class="p-2 border-b border-gray-200">{{$purchase->total}}</th>
                    </tr>
                    <tr>
                        <td class="p-2 text-right" colspan="6">Tax</td>
                        <th class="p-2 border-b border-gray-200">{{$purchase->tax}}</th>
                    </tr>
                    <tr>
                        <td class="p-2 text-right" colspan="6">Discount</td>
                        <th class="p-2 border-b border-gray-200">{{$purchase->discount}}</th>
                    </tr>
                    <tr>
                        <td class="p-2 text-right" colspan="6">Shipping Cost</td>
                        <th class="p-2 border-b border-gray-200">{{$purchase->shipping_cost}}</th>
                    </tr>
                    <tr>
                        <td class="p-2 text-right" colspan="6">Grand Total</td>
                        <th class="p-2 border-b border-gray-200">{{$purchase->grand_total}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
</div>