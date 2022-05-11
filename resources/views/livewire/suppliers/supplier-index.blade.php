<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">supplier</h1>
        <button class="btn btn-indigo" wire:click="modalOn" wire:target="modalOn"  wire:loading.attr="disabled">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>Add New supplier
        </button>
    </header>
    <x-jet-dialog-modal maxWidth="sm" wire:model="modal">
        <x-slot name="title">
            @if ($supplierId==null)
                Create new supplier
            @else
                Edit supplier
            @endif
        </x-slot>
        <x-slot name="content">
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="name">Name</label>
                <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('supplier.name') border-red-500 @enderror " wire:model.defer="supplier.name" autocomplete="off" />
                @error('supplier.name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="email">Email</label>
                <input type="input" autocomplete="off" id="email" type="text" class="mt-1 block w-full form-input @error('supplier.email') border-red-500 @enderror " wire:model.defer="supplier.email" autocomplete="off" />
                @error('supplier.email')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="phone">Phone</label>
                <input type="input" autocomplete="off" id="phone" type="text" class="mt-1 block w-full form-input @error('supplier.phone') border-red-500 @enderror " wire:model.defer="supplier.phone" autocomplete="off" />
                @error('supplier.phone')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="address">Address</label>
                <textarea id="address" wire:model.defer="supplier.address" class="form-input @error('supplier.address') border-red-500 @enderror  rounded-md shadow-sm w-full" cols="30" rows="5"></textarea>
                @error('supplier.address')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class=" btn btn-secondary text-indigo-500" wire:click="modalOff">Cancel</button>
            <button class="ml-2 btn btn-indigo" type="button" wire:target="store" wire:click="store" wire:loading.attr="disabled">Save</button>
        </x-slot>
    </x-jet-dialog-modal>
    <main>
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
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">phone</th>
                                <th class="px-4 py-2 text-left">address</th>
                                <th class="px-4 py-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr class="bg-white font-normal hover:bg-gray-50 antialiased border-b border-gray-200">
                                    <td class="px-4 py-2">
                                        <p class="font-bold tracking-wide text-gray-800">{{$supplier->name}}</p>
                                        <span class="text-indigo-600 text-xs font-semibold">{{$supplier->email}}</span>
                                    </td>
                                    <td class="px-4 py-2">{{$supplier->phone}}</td>
                                    <td class="px-4 py-2">{{$supplier->address}}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center">
                                            <button wire:click="edit({{$supplier->id}})" class="btn-sm btn-secondary mr-2">
                                                <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button wire:click="$emit('confirmDelete',{{$supplier->id}})" class="btn-sm btn-secondary">
                                                <svg class="w-4 h-4 stroke-current text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center py-3">
                                            <img src="{{asset('images/no-data.webp')}}" class="w-1/2 mx-auto" alt="No data">
                                            <h3 class="text-lg text-gray-700 font-bold">Sorry, Data Not Found</h3>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-3 py-2 text-sm">
                {{$suppliers->links()}}
            </div>
        </div>
    </div>
</div>