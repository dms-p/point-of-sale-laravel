<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Stock Out</h1>
        <button class="btn btn-indigo" wire:click="modalOn" wire:target="modalOn"  wire:loading.attr="disabled">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Add Stock Out
        </button>
    </header>
    <x-jet-dialog-modal maxWidth="sm" wire:model="modal">
        <x-slot name="title">
            @if ($stockOutId==null)
                Create new Stock In
            @else
                Edit Stock In
            @endif
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="stockOut.item_id">Item</label>
                <select class="form-select w-full @error('stockOut.item_id') border-red-500 @enderror" id="stockOut.item_id" wire:model="stockOut.item_id">
                    <option >choose one</option>
                    @foreach ($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('stockOut.item_id')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="qty">qty</label>
                <input type="input" autocomplete="off" id="qty" class="mt-1 block w-full form-input @error('stockOut.qty') border-red-500 @enderror " wire:model.defer="stockOut.qty" autocomplete="off" />
                @error('stockOut.qty')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="date">date</label>
                <input type="date" autocomplete="off" id="date" class="mt-1 block w-full form-input @error('stockOut.date') border-red-500 @enderror " wire:model.defer="stockOut.date" autocomplete="off" />
                @error('stockOut.date')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="note">note</label>
                <textarea rows="3" id="note" wire:model.defer="stockOut.note" class="form-input @error('stockOut.note') border-red-500 @enderror  rounded-md shadow-sm w-full" cols="30" rows="5"></textarea>
                @error('stockOut.note')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class=" btn btn-secondary text-indigo-500" wire:click="modalOff">Cancel</button>
            <button class="ml-2 btn btn-indigo" type="button" wire:target="store" wire:click="store" wire:loading.attr="disabled">Save</button>
        </x-slot>
    </x-jet-dialog-modal>
    <main class="flex flex-col sm:flex-row">
        <div class="p-1 w-full">
            <div class="bg-white py-2 overflow-hidden shadow sm:rounded-lg">
                <div class="w-full flex py-2 px-4 mb-2 justify-between items-center">
                    <select class="form-select" wire:model="listCount">
                        <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                    </select>
                    <input type="text" wire:model="search" class="form-input">
                </div>
                <div class="">
                    <table class="w-full mb-3">
                        <thead>
                            <tr class="bg-gray-200 bg-opacity-50 text-gray-500 font-normal text-sm antialiased border-b border-t border-gray-200">
                                <th class="px-4 py-2 text-left">Product</th>
                                <th class="px-4 py-2 text-left">QTY</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockOuts as $stockOut)
                                <tr class="bg-white font-normal hover:bg-gray-50 antialiased border-b border-gray-200">
                                    <td class="px-4 py-2">
                                        <p class="font-bold tracking-wide text-gray-800">{{$stockOut->item->name}}</p>
                                        <span class="text-indigo-600 text-xs font-semibold">{{$stockOut->item->code}}</span>
                                    </td>
                                    <td class="px-4 py-2">{{$stockOut->qty}}</td>
                                    <td class="px-4 py-2">{{$stockOut->date}}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center">
                                            <button wire:click="edit({{$stockOut->id}})" class="p-2 mr-2 border border-gray-200 appearance-none focus:outline-none bg-white hover:bg-gray-50 rounded-md">
                                                <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button wire:click="$emit('confirmDelete',{{$stockOut->id}})" class="p-2 mr-2 border border-gray-200 appearance-none focus:outline-none bg-white hover:bg-gray-50 rounded-md">
                                                <svg class="w-4 h-4 stroke-current text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2">
                {{$stockOuts->links()}}
            </div>
        </div>
    </main>
</div>