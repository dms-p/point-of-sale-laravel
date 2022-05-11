
    <nav class="no-print">
        <div id="topNav" class="bg-blue-900 flex items-center w-full sm:flex-no-wrap flex-wrap justify-between sm:px-8 px-4 py-3">
            <div id="title" class="font-semibold inline-flex items-center">
                <div class="mr-3">
                    @if (Auth::user()->role->name === 'Admin')
                    <a href="{{route('sales.show',$sales->slug)}}" class="p-3 rounded-lg inline-flex text-gray-300 items-center justify-center bg-black bg-opacity-25"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg></a>
                    @else
                    <a href="{{route('salesCashier.show',$sales->slug)}}" class="p-3 rounded-lg inline-flex text-gray-300 items-center justify-center bg-black bg-opacity-25"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg></a>
                    @endif
                </div>
                <div>
                    <span class="text-gray-300 text-sm tracking-wide">Sales</span>
                    <p class="m-0 text-white text-lg">{{$sales->code}}</p>
                </div>
            </div>
            <div class="inline-flex sm:py-0 p-2 sm:justify-end justify-center">
                <button wire:loading.attr="disabled" wire:click="print" class="btn btn-indigo"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>Print</button>
            </div>
        </div>
    </nav>
    <div x-data="{ tab: 'receipt' }">
        <div id="bottomNav" class="bg-gray-200 flex items-center justify-center no-print">
            <!--li class="list-none"><a :class="{'border-blue-800': tab === 'dotmetrick'}" class="px-4 py-3 block border-b-2 border-transparent" @click.prevent="tab = 'dotmetrick'" href="#">dotmetrick</a></!--li-->
            <li class="list-none"><a :class="{'border-blue-800': tab === 'receipt'}" class="px-4 py-3  block border-b-2 border-transparent " @click.prevent="tab ='receipt'" href="#">receipt</a></li>
            <li class="list-none"><a :class="{'border-blue-800': tab === 'a4'}" class="px-4 py-3  block border-b-2 border-transparent " @click.prevent="tab = 'a4'" href="#">a4</a></li>
        </div>
        <main class="w-full min-h-screen flex justify-center sm:px-2 px-4 py-4 pt-8" >
            <!--div x-show="tab === 'dotmetrick'">
                
            </!--div-->
            <div class="sm:w-3/5 w-full" id="a4" x-show="tab === 'a4'">
                <div id="title" class="grid grid-cols-2 grid-rows-1 gap-3">
                    <h1 class="text-3xl italic text-gray-800 uppercase font-bold">Invoice</h1>
                    <table>
                        <tr>
                            <th class="text-right">No. Reference :</th>
                            <td class="text-right w-40">{{$sales->code}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Date :</th>
                            <td class="text-right w-40">{{date_format($sales->updated_at,'d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Status :</th>
                            <td class="text-right w-40">{{$sales->status}}</td>
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
                        <p class="text-xl font-semibold">{{$sales->customer->name}}</p>
                        <p class="mt-2 text-gray-600">{{$sales->customer->address}}</p>
                        <p class="text-gray-600">Email : {{$sales->customer->email}}</p>
                        <p class="text-gray-600">Telp : {{$sales->customer->phone}}</p>
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
                        @foreach ($sales->itemsales as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="p-2 text-center">{{$loop->iteration}}</td>
                                <td class="p-2">
                                    <p>{{$item->item->name}}</p>
                                    <span class="text-indigo-500 text-xs tracking-wide">{{$item->item->code}}</span>
                                </td>
                                <td class="p-2 text-center">{{$item->price}}</td>
                                <td class="p-2 text-center">{{$item->qty}} {{$item->item->uom->name}}</td>
                                <td class="p-2 text-center">{{$item->tax}}</td>
                                <td class="p-2 text-center">{{$item->discount}}</td>
                                <td class="p-2 text-center">{{$item->grand_total}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="p-2 text-right" colspan="6">Sub Total</td>
                            <th class="p-2 border-b border-gray-200">{{$sales->total}}</th>
                        </tr>
                        <tr>
                            <td class="p-2 text-right" colspan="6">Tax</td>
                            <th class="p-2 border-b border-gray-200">{{str_replace('+','',$sales->tax)}}</th>
                        </tr>
                        <tr>
                            <td class="p-2 text-right" colspan="6">Discount</td>
                            <th class="p-2 border-b border-gray-200">{{str_replace('-','',$sales->discount)}}</th>
                        </tr>
                        <tr>
                            <td class="p-2 text-right" colspan="6">Shipping Cost</td>
                            <th class="p-2 border-b border-gray-200">{{str_replace('+','',$sales->shipping_cost)}}</th>
                        </tr>
                        <tr>
                            <td class="p-2 text-right" colspan="6">Grand Total</td>
                            <th class="p-2 border-b border-gray-200">{{$sales->grand_total}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="sm:w-3/12 w-full" id="receipt" x-show="tab === 'receipt'">
                <div class="font-mono">
                    <p class="text-center font-semibold text-lg">{{$store->name}}</p>
                    <p class="text-center">{{$store->address}}</p>
                    <p class="text-center">Telp. {{$store->phone}} | E-mail. {{$store->email}}</p>
                    <hr class="border border-dotted border-black mt-5">
                    <hr class="border border-dotted border-black mt-1">
                    <table>
                        <tr>
                            <td class="p-1">{{$sales->code}}</td>
                            <td class="text-right p-1">{{date_format($sales->created_at,'d-m-Y')}}</td>
                        </tr>
                    </table>
                    <hr class="border border-dotted border-black">
                    <hr class="border border-dotted border-black mt-1">
                    <table class="w-full">
                        @forelse ($sales->itemSales as $item)
                        <tr>
                            <td class="p-1"><b>{{$item->item->name}}</b><br><span class="text-xs">@ {{$item->price}}</span> </td>
                            <td class="p-1">{{$item->tax}}</td>
                            <td class="p-1">{{$item->discount}}</td>
                            <td class="p-1">{{$item->qty}} {{$item->item->uom->name}}</td>
                            <td class="p-1">{{$item->grand_total}}</td>
                        </tr>
                        @empty
                            <tr><td colspan="4">No Item</td></tr>
                        @endforelse
                    </table>
                    <hr class="border border-dotted border-black mt-3">
                    <table>
                        <tr>
                            <td class="p-1">Total</td>
                            <td class="text-right p-1">{{$sales->total}}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Tax</td>
                            <td class="text-right p-1">{{$sales->tax}}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Discount</td>
                            <td class="text-right p-1">{{$sales->discount}}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Shipping Cost</td>
                            <td class="text-right p-1">{{$sales->shipping_cost}}</td>
                        </tr>
                    </table>
                    <hr class="border border-dotted border-black mt-3">
                    <table>
                        <tr>
                            <td class="p-1">Grand Total</td>
                            <td class="text-right p-1">{{$sales->grand_total}}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Bayar</td>
                            <td class="text-right p-1">{{$sales->paid}}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Kembalian</td>
                            <td class="text-right p-1">{{$sales->changes}}</td>
                        </tr>
                    </table>
                    <hr class="border border-dotted border-black">
                    <hr class="border border-dotted border-black mt-1">
                    <p class="text-center">Kasir : {{$sales->user->name}}</p>
                    <hr class="border border-dotted border-black mb-6">
                    <p class="text-center">{{$store->footer_recipt}}</p>
                </div>
            </div>
        </main>
    </div>