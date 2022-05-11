<div>
    <div class="relative bg-indigo-200 p-4 sm:p-6 rounded overflow-hidden mb-8">
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
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="blue" counter="{{$totalSales}}" title="Total All Sales">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </x-counter-card>
        </div>
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="yellow" counter="{{$totalOwnSales}}" title="Total Your Sales">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </x-counter-card>
        </div>
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="pink" counter="{{$totalCustomer}}" title="Total Customer">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </x-counter-card>
        </div>
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="purple" counter="Rp.{{number_format($totalProfit)}}" title="Total Profit">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </x-counter-card>
        </div>
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="orange" counter="Rp.{{number_format($totalOwnProfit)}}" title="Total Your Profit">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </x-counter-card>
        </div>
        <div class="sm:w-1/3 w-1/2 px-2 pb-2">
            <x-counter-card color="teal" counter="{{$totalItem}}" title="Total Item">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
            </x-counter-card>
        </div>
        <div class="px-2 pb-2 sm:w-1/2 w-full">
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
        <div class="px-2 pb-2 sm:w-1/2 w-full">
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
</div>
