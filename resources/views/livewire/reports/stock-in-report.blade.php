<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Laporan Barang Masuk</h1>
    </header>
    <main>
        <div class="p-1 w-full">
            <div class="bg-white rounded-lg border border-gray-200 py-3 px-5 flex justify-between items-end">
                <!--name-->
                <div>
                    <label class="block text-sm font-medium mb-1" for="startDate">Start Date</label>
                    <input type="date" autocomplete="off" id="startDate" type="text" class="mt-1 block w-full form-input @error('startDate') border-red-500 @enderror " wire:model.defer="startDate" autocomplete="off" />
                    @error('startDate')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <!--name-->
                <div>
                    <label class="block text-sm font-medium mb-1" for="finishDate">Finish Date</label>
                    <input type="date" autocomplete="off" id="finishDate" type="text" class="mt-1 block w-full form-input @error('finishDate') border-red-500 @enderror " wire:model.defer="finishDate" autocomplete="off" />
                    @error('finishDate')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div id="item">
                    <label class="block text-sm font-medium mb-1" for="itemId">Product</label>
                    <select class="form-select" wire:model.defer="itemId">
                        <option value="0">All Product</option>
                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-indigo" wire:loading.attr="disabled" wire:target="find" wire:click="find"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
            </div>
            <div class="bg-white rounded-lg  mt-2 border-gray-200 py-3 px-5">
                @if ($stocks!=null)
                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <button wire:click="download" wire:target="download" wire:loading.attr="disabled" class="btn-sm btn-red"><svg class="w-4 mr-2 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>Download As PDF</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
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
                                    <td>{{$stock->qty}} {{$stock->item->uom->name}}</td>
                                    <td>{{date_format(date_create($stock->date),'d-m-Y')}}</td>
                                    <td class="w-2/5">{{$stock->note}}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center">Data Not found</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>