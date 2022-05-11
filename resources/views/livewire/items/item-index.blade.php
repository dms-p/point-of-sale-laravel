<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Item</h1>
        <a href="{{route('item.create')}}" class="btn btn-indigo">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Create New Item
        </a>
    </header>
    <main class="bg-white w-full mt-3 py-2 overflow-hidden rounded-lg shadow">
        <div class="w-full flex py-2 px-4 mb-2 justify-between items-center">
            <select class="form-select" wire:model="listCount">
                <option value="5">5</option>
                <option selected value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
            <select class="form-select" wire:model="brandId">
                <option selected value>All Brands</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <select class="form-select" wire:model="categoryId">
                <option selected value>All categories</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select class="form-select" wire:model="supplierId">
                <option selected value>All suppliers</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
            <input type="text" wire:model="search" class="form-input">
        </div>
        <div class="">
            <table class="w-full mb-3">
                <thead>
                    <tr class="bg-gray-200 bg-opacity-50 text-gray-500 font-normal text-sm antialiased border-b border-t border-gray-200">
                        <th class="px-4 py-2 text-left">Product</th>
                        <th class="px-4 py-2 text-left">Code</th>
                        <th class="px-4 py-2 text-left">Cost</th>
                        <th class="px-4 py-2 text-left">Price</th>
                        <th class="px-4 py-2 text-left">Brand</th>
                        <th class="px-4 py-2 text-left">Supplier</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="bg-white font-normal hover:bg-gray-50 antialiased border-b border-gray-200">
                            <td class="px-4 py-2">
                                <p class="font-semibold mr-auto">{{$item->name}}</p>
                                <div class="text-xs text-gray-500">Stock : <span class="font-bold text-gray-700">{{$item->qty}} Pcs</span>, category : <span class="font-bold text-gray-700">{{$item->category->name}}</span></div>
                            </td>
                            <td class="px-4 py-2 text-sm">{{$item->code}}</td>
                            <td class="px-4 py-2 text-sm">{{$item->cost}}</td>
                            <td class="px-4 py-2 text-sm">{{$item->price}}</td>
                            <td class="px-4 py-2 text-sm">{{$item->brand->name}}</td>
                            <td class="px-4 py-2 text-sm">{{$item->supplier->name}}</td>
                            <td class="px-4 py-2 text-sm">
                                <div class="flex justify-center">
                                    <a href="{{route('item.edit',$item->slug)}}" class="btn-sm mr-2 btn-secondary">
                                        <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <button class="btn-sm mr-2 btn-secondary" type="button" wire:click="confirmDelete('{{$item->slug}}')">
                                        <svg class="w-4 h-4 stroke-current text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                    <a href="{{route('item.show',$item->slug)}}" class="btn-sm btn-secondary">
                                        <svg class="w-4 h-4 stroke-current text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-no-result count="6"></x-no-result>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    <div class="px-3 py-2 text-sm">
        {{$items->links()}}
    </div>
</div>