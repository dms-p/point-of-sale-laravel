<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Brand</h1>
    </header>
    <main class="flex flex-col sm:flex-row">
        <div class="sm:w-2/6  w-full p-1">
            @if ($status=='edit')
                @livewire('brands.brand-edit')
            @else
                @livewire('brands.brand-create')
            @endif
        </div>
        <div class="sm:w-4/6 w-full p-1">
            <div class="bg-white rounded-md shadow overflow-hidden sm:rounded-md w-full">
                <div class="w-full flex py-2 px-4 mb-2 justify-between items-center">
                    <select wire:model="listCount" class="form-select" id="">
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
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr :key="$brand->id" class="bg-white font-normal hover:bg-gray-50 antialiased border-b border-gray-200">
                                    <td class="px-4 py-2">{{$loop->iteration}}</td>
                                    <td class="px-4 py-2">{{$brand->name}}</td>
                                    <td class="px-4 py-2">{{$brand->description}}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center">
                                            <button type="button" wire:click="edit({{$brand->id}})" class="btn-sm btn-secondary mr-2">
                                                <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button type="button" wire:click="$emit('confirmDelete',{{$brand->id}})" class="btn-sm btn-secondary">
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
            <div class="px-3 py-2">
                {{$brands->links()}}
            </div>
        </div>
    </main>
</div>