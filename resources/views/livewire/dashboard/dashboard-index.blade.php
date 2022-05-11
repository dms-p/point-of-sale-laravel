<div>
    <main>
        <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8">
            <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
                <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path id="welcome-a" d="M64 0l64 128-64-20-64 20z"/>
                    <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z"/>
                    <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z"/>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                        <stop stop-color="#A5B4FC" offset="0%"/>
                        <stop stop-color="#818CF8" offset="100%"/>
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                        <stop stop-color="#4338CA" offset="0%"/>
                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%"/>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="rotate(64 36.592 105.604)">
                        <mask id="welcome-d" fill="#fff">
                            <use xlink:href="#welcome-a"/>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-a"/>
                        <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z"/>
                    </g>
                    <g transform="rotate(-51 91.324 -105.372)">
                        <mask id="welcome-f" fill="#fff">
                            <use xlink:href="#welcome-e"/>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-e"/>
                        <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z"/>
                    </g>
                    <g transform="rotate(44 61.546 392.623)">
                        <mask id="welcome-h" fill="#fff">
                            <use xlink:href="#welcome-g"/>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-g"/>
                        <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z"/>
                    </g>
                </g>
                </svg>
            </div>
            <div class="relative">
                <h1 class="text-2xl md:text-3xl text-gray-800 font-bold mb-1">Hello, {{Auth::user()->name}} 👋</h1>
                <p>Here is what’s happening with your store today:</p>
            </div>
        </div>
        <div  class="flex flex-row flex-wrap py-3">
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counte-rcard color="blue" counter="{{$categoriesCount}}" title="Total Categories">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="yellow" counter="{{$itemCount}}" title="Total Items">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="pink" counter="{{$officerCount}}" title="Total Employee">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="purple" counter="{{$profitCount}}" title="Total Profit">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="orange" counter="{{$supplierCount}}" title="Total Supplier">
                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="teal" counter="{{$customerCount}}" title="Total Customer">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="indigo" counter="{{$purchaseCount}}" title="Total Purchases">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                </x-counter-card>
            </div>
            <div class="sm:w-1/4 w-1/2 px-2 pb-2">
                <x-counter-card color="yellow" counter="{{$salesCount}}" title="Total Sales">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </x-counter-card>
            </div>
            <div class="px-2 pb-2 w-full sm:w-3/3">
                <div class="card bg-white">
                    <div class="flex w-full px-4 justify-between items-center">
                        <h3>Overview</h3>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
            <div class="px-2 pb-2 w-full">
                <div class="bg-white rounded-lg border border-gray-200 pb-2">
                    <div class="py-3 px-5 mb-3 w-full inline-flex itees-center justify-between">
                        <span class="text-md font-semibold text-gray-700">Recent Sale</span>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left px-4">Customer</th>
                                <th class="text-left px-4">Seller</th>
                                <th class="text-left px-4">Grand Total</th>
                                <th class="text-left px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastSales as $sale)
                                <tr class="text-sm antialiased">
                                    <td class="px-4 py-2">
                                        <p class="font-bold tracking-wide text-gray-800">{{$sale->customer->name}}</p>
                                        <span class="text-indigo-600 text-xs font-semibold">{{$sale->code}}</span>
                                    </td>
                                    <td class="px-4 py-2">{{$sale->user->name}}</td>
                                    <td class="px-4 py-2">{{$sale->grand_total}}</td>
                                    <td class="px-4 py-2"><x-badge-sales status="{{$sale->status}}"></x-badge-sales></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-2 pb-2 w-full">
                <div class="bg-white rounded-lg border border-gray-200 pb-2">
                    <div class="py-3 px-5 mb-3 w-full inline-flex items-center justify-between">
                        <span class="text-md font-semibold text-gray-700">Recent Purchase</span>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left px-4">Supplier</th>
                                <th class="text-left px-4">Grand Total</th>
                                <th class="text-left px-4">Date Required</th>
                                <th class="text-left px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastPurchases as $purchase)
                                <tr class="text-sm antialiased">
                                    <td class="px-4 py-2">
                                        <p class="font-bold tracking-wide text-gray-800">{{$purchase->supplier->name}}</p>
                                        <span class="text-indigo-600 text-xs font-semibold">{{$purchase->code}}</span>
                                    </td>
                                    <td class="px-4 py-2">{{$purchase->grand_total}}</td>
                                    <td class="px-4 py-2">{{$purchase->date_required}}</td>
                                    <td class="px-4 py-2"><x-badge-sales status="{{$purchase->status}}"></x-badge-sales></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-2 pb-2 sm:w-1/3 w-full">
                <div class="bg-white rounded-lg border border-gray-200 pb-2">
                    <div class="py-3 px-5 w-full inline-flex items-center justify-between text-gray-700">
                        <span class="text-md font-semibold">Top 5 Seller on {{DATE('F')}}</span>
                        <a href="{{route('sales.index')}}" class="font-semibold border hover:bg-gray-200 hover:text-gray-600 border-gray-200 text-xs bg-gray-100 rounded py-1 px-3 text-gray-500 antialiased items-center" href="#"><i class="fal fa-lg fa-eye mr-1"></i>See All</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Name</th>
                                <th>Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bestSales as $sales)
                                <tr class="antialiased">
                                    <td class="py-1 px-2 font-bold tracking-wide text-gray-800">{{$sales->name}} <br><span class="text-indigo-600 text-xs font-semibold">Total Sales : {{$sales->totalSales}}</span> </td>
                                    <td class="py-1 px-2 text-center text-xs tracking-wide">Rp. {{number_format($sales->GrandTotal)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-2 pb-2 sm:w-1/3 w-full">
                <div class="bg-yellow-200 rounded-lg border border-yellow-300 pb-2">
                    <div class="py-3 px-5 w-full inline-flex items-center justify-between text-gray-700">
                        <span class="text-md font-semibold">Stock Alert</span>
                        <a href="{{route('purchase.create')}}" class="font-semibold border hover:bg-yellow-300 hover:text-yellow-700 border-yellow-600 text-xs bg-yellow-200 rounded py-1 px-3 text-yellow-600 antialiased items-center" href="#"><i class="fal fa-lg fa-cart-plus mr-1"></i>Purchase Now</a>
                    </div>
                    <table>
                        <thead>
                            <tr class="bg-yellow-300">
                                <th class="text-left">#</th>
                                <th class="text-left">Product</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockAlert as $item)
                                <tr class="text-sm antialiased font-semibold">
                                    <td class="py-1 px-2">
                                        {{$loop->iteration}}                                       
                                    </td>
                                    <td class="py-1 px-2">{{$item->name}} <br> <span class="text-yellow-700">{{$item['code']}}</span> </td>
                                    <td class="py-1 px-2 text-center">{{$item->qty}} {{$item->uom->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-2 pb-2 sm:w-1/3 w-full">
                <div class="bg-white rounded-lg border border-gray-200 pb-2">
                    <div class="py-3 px-5 w-full inline-flex items-center justify-between text-gray-700">
                        <span class="text-md font-semibold">Top Product on {{DATE('F')}}</span>
                        <a class="font-semibold text-xs bg-gray-100 rounded py-1 px-3 text-gray-500 antialiased items-center" href="#"><i class="fal fa-lg fa-eye mr-1"></i>See All</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topProduct as $product)
                                <tr class="antialiased">
                                    <td class="py-1 px-2 font-bold tracking-wide text-gray-800">{{$product->name}} <br><span class="text-indigo-600 text-xs font-semibold">code : {{$product->code}}</span> </td>
                                    <td class="py-1 px-2 text-center text-xs tracking-wide">{{$product->qtyItem}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@push('script')
<script src="{{asset('js/apexcharts.js')}}"></script>
<script>
    function chart(data,selector)
    {
        let tes=data
            let options = {
                series: [{
                    name: "Sales",
                    data: tes.total.sales,
                },{
                    name: "Purchase",
                    data: tes.total.purchase,
                }],
                    chart: {
                        height: 350,
                        type: 'area',
                        zoom: {
                        enabled: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                },
                // markers: {
                //     size: 5,
                //     colors: ["#1a56db"],
                //     strokeColor: "#ffffff",
                //     strokeWidth: 3
                // },
                // fill:{
                //     type:'gradient',
                //     gradient: {
                //         shadeIntensity: 1,
                //         opacityFrom: 1,
                //         opacityTo: 0,
                //         stops: [0, 100]
                //     }
                // },
                xaxis: {
                    categories: tes.labels,
                        style:{
                            colors:['#1a56db']
                        }
                },
                yaxis:{
                    labels:{
                        formatter:function(value)
                        {
                            return (value/1000)+"K";
                        }
                    }
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return val;
                    }
                }
                }
            };
            var chart = new ApexCharts(document.querySelector(selector), options);
            chart.render();
    }
    console.log({!!$charts!!})
    chart({!!$charts!!},'#chart');
</script>
@endpush