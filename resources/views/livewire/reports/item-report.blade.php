<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Laporan Barang</h1>
        @if (!empty($items))
            <button wire:click="download" wire:target="download" wire:loading.attr="disabled" class="btn-sm btn-red"><svg class="w-4 mr-2 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>Download As PDF</button>
        @endif
    </header>
    <main>
        <div class="w-full px-2 pb-2">
            <div class="bg-white rounded-lg border border-gray-200 py-3 px-5 flex justify-between items-end">
                <div id="categoryId">
                    <label class="block text-sm font-medium mb-1" for="categoryId">Category</label>
                    <select class="form-select w-full" wire:model.defer="categoryId">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="brandId">
                    <label class="block text-sm font-medium mb-1" for="brandId">Brand</label>
                    <select class="form-select w-full" wire:model.defer="brandId">
                        <option value="">All Brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="supplierId">
                    <label class="block text-sm font-medium mb-1" for="supplierId">Supllier</label>
                    <select class="form-select w-full" wire:model.defer="supplierId">
                        <option value="">All Suppliers</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-indigo" wire:loading.attr="disabled" wire:target="find" wire:click="find"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
            </div>
            <div class="bg-white rounded-lg  mt-2 border-gray-200 py-3 px-5">
                @if ($items!=null)
                    <table class="table">
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
                @endif
            </div>
        </div>
    </main>
</div>