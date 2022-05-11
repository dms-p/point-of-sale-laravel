<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Laporan Pembelian</h1>
        @if ($purchases!=null)
        <button wire:click="download" wire:target="download" wire:loading.attr="disabled" class="btn-sm btn-red"><svg class="w-4 mr-2 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>Download As PDF</button>
        @endif
    </header>
    <main>
        <div class="w-full px-2 pb-2">
            <div class="bg-white rounded-lg border border-gray-200 py-3 px-5 flex justify-between items-end">
                <div id="startDateInput">
                    <label for="startDate">Start Date</label>
                    <input wire:model.defer="startDate" type="date" class="form-input"/>
                </div>
                <div id="finishDateInput">
                    <label for="finishDate">Finish Date</label>
                    <input wire:model.defer="finishDate" type="date" class="form-input"/>
                </div>
                <div id="supplierId">
                    <label for="supplierId">Supplier</label>
                    <select id="supplierId" class="form-select" wire:model.defer="supplierId">
                        <option value="">All Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="status">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" wire:model.defer="purchaseStatus">
                        <option value="">All Status</option>
                        @foreach ($status as $state)
                            <option value="{{$state}}">{{$state}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-indigo" wire:loading.attr="disabled" wire:target="find" wire:click="find"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
            </div>
            <div class="bg-white rounded-lg border border-gray-200 py-3 px-5 mt-2">
                @if ($purchases!=null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-xs">No</th>
                                <th class="text-left text-xs">Purchases ID</th>
                                <th class="text-left text-xs">Supplier</th>
                                <th class="text-xs">Total Item</th>
                                <th class="text-xs">Tax</th>
                                <th class="text-xs">Discount</th>
                                <th class="text-xs">Shipping Cost</th>
                                <th class="text-xs">Grand total</th>
                                <th class="text-xs">Status</th>
                                <th class="text-xs">Date Required</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                                <tr>
                                    <td class="text-center text-xs">{{$loop->iteration}}</td>
                                    <td>{{$purchase->code}}</td>
                                    <td>{{$purchase->supplier->name}}</td>
                                    <td class="text-center text-xs">{{$purchase->itemPurchases->count()}}</td>
                                    <td class="text-center text-xs">{{$purchase->tax}}</td>
                                    <td class="text-center text-xs">{{$purchase->discount}}</td>
                                    <td class="text-center text-xs">{{$purchase->grand_total}}</td>
                                    <td class="text-center text-xs">{{$purchase->shipping_cost}}</td>
                                    <td class="text-center text-xs">{{$purchase->status}}</td>
                                    <td class="text-center text-xs">{{date('d-m-Y',strtotime($purchase->date_required))}}</td>
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