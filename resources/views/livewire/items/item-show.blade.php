<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">{{$item->name}}'s Detail</h1>
        <a class="btn-sm btn-indigo" href="{{route('item.index')}}" title="Back">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        </a>
    </header>
    <main>
        <div class="bg-white rounded-md shadow overflow-hidden sm:rounded-md p-6 w-full">
            <div class="flex items-start">
                <div class="sm:w-2/3 w-full p-2 title">
                    <div class="inline-flex text-sm hover:bg-green-200 bg-green-100 text-green-700 border border-green-200 rounded items-center px-3 py-1">
                        <svg class="w-4 h-4 mr-2 stroke-current text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg> {{$item->category->name}}
                    </div>
                    <h1 class="text-3xl mt-2 mb-0 uppercase">{{$item->name}}</h1>
                    <span class="text-gray-500 text-sm">Code : {{$item->slug}}</span>
                    <img class="block mb-3 mt-2 sm:hidden w-full" src="{{Storage::url($item->image)}}" alt="{{$item->name}}">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Brand</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->brand->name}}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Supplier</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->supplier->name}}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Stock</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->qty}} {{$item->uom->name}}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Cost</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->cost}}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Price</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->price}}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-sm text-gray-500">Discontinue</td>
                                <td class="py-1 text-sm font-semibold text-gray-700">{{$item->discontinue}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-2 mt-4">
                <p class="text-gray-800 text-lg font-semibold">Description</p>
                <p class="text-gray-500 mb-4">{{$item->description}}</p>
            </div>
        </div>
    </main>
</div>
