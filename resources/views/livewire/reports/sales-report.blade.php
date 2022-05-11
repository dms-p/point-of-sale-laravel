<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Laporan Penjualan</h1>
        @if ($sales!=null)
            <button wire:click="download" wire:target="download" wire:loading.attr="disabled" class="btn-sm btn-red"><svg class="w-4 mr-2 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>Download As PDF</button>
        @endif
    </header>
    <main>
        <div class="p-1 w-full">
            <div class="bg-white rounded-lg border border-gray-200 py-3 px-5 flex justify-between items-end">
                <div id="startDateInput">
                    <label class="block text-sm font-medium mb-1" for="startDate">Start Date</label>
                    <input wire:model.defer="startDate" class="form-input @error('startDate') border-red-500 @enderror w-full" type="date"/>
                    @error('startDate')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div id="finishDateInput">
                    <label class="block text-sm font-medium mb-1" for="finishDate">Finish Date</label>
                    <input wire:model.defer="finishDate" class="form-input @error('finishDate') border-red-500 @enderror w-full" type="date"/>
                    @error('finishDate')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div id="finishDateInput">
                    <label class="block text-sm font-medium mb-1" for="finishDate">Seller</label>
                    <select class="form-select" wire:model.defer="seller">
                        <option value="">All Seller</option>
                        @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->name}}</option>
                        @endforeach
                    </select >
                </div>
                <div id="finishDateInput">
                    <label class="block text-sm font-medium mb-1" for="saleStatus">Status</label>
                    <select class="form-select" wire:model.defer="salesStatus">
                        <option value="">All Status</option>
                        @foreach ($status as $state)
                            <option value="{{$state}}">{{$state}}</option>
                        @endforeach
                    </select >
                </div>
                <button class="btn btn-indigo" wire:loading.attr="disabled" wire:target="find" wire:click="find"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 py-3 mt-2 px-5">
                @if ($sales!=null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-xs">No</th>
                                <th class="text-left text-xs">Invoice ID</th>
                                <th class="text-left text-xs">Seller</th>
                                <th class="text-left text-xs">Customer</th>
                                <th class="text-xs">Total Item</th>
                                <th class="text-xs">Discount</th>
                                <th class="text-xs">Tax</th>
                                <th class="text-xs">Shipping Cost</th>
                                <th class="text-xs">Grand total</th>
                                <th class="text-xs">Status</th>
                                <th class="text-xs">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $sale)
                                <tr>
                                    <td class="text-center text-xs">{{$loop->iteration}}</td>
                                    <td class="text-xs">{{$sale->code}}</td>
                                    <td class="text-xs">{{$sale->user->name}}</td>
                                    <td class="text-xs">{{$sale->customer->name}}</td>
                                    <td class="text-center text-xs">{{$sale->itemsales->count()}}</td>
                                    <td class="text-center text-xs">{{$sale->discount}}</td>
                                    <td class="text-center text-xs">{{$sale->tax}}</td>
                                    <td class="text-center text-xs">{{$sale->shipping_cost}}</td>
                                    <td class="text-center text-xs">{{$sale->grand_total}}</td>
                                    <td class="text-center text-xs">{{$sale->status}}</td>
                                    <td class="text-center text-xs">{{date('d-m-Y',strtotime($sale->created_at))}}</td>
                                </tr>
                            @empty
                                <tr><td colspan="9" class="text-center">Data Not found</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </main>
</div>