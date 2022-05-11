<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Crete new Item</h1>
    </header>
    <main>
        <div class="bg-white rounded-md shadow overflow-hidden sm:rounded-md w-full">
            <form wire:submit.prevent="store">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-start flex-col sm:flex-row">
                        <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                            <h3 class="text-lg font-medium text-gray-900">General Information</h3>
                            <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                        </div>
                        <div class="sm:w-4/6 w-full flex flex-wrap">
                            <div class="w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="name">Name</label>
                                    <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('item.name') border-red-500 @enderror " wire:model.defer="item.name" autocomplete="off" />
                                    @error('item.name')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="code">Item Code</label>
                                    <input type="input" autocomplete="off" id="code" type="text" class="mt-1 block w-full form-input @error('item.code') border-red-500 @enderror " readonly wire:model.defer="item.code" autocomplete="of" />
                                    @error('item.code')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="categoryId">Category</label>
                                    <select class="form-select w-full @error('item.category_id') border-red-500 @enderror" wire:model.defer="item.category_id" id="categoryId">
                                        <option selected>Choose one Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item.category_id')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8 border-gray-200">
                    <div class="flex items-start flex-col sm:flex-row">
                        <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                            <h3 class="text-lg font-medium text-gray-900">Pricing</h3>
                            <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                        </div>
                        <div class="sm:w-4/6 w-full flex flex-wrap">
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="cost">Cost</label>
                                    <input type="number" min="0" autocomplete="off" id="cost" type="text" class="mt-1 block w-full form-input @error('item.cost') border-red-500 @enderror " wire:model.defer="item.cost" autocomplete="cost" />
                                    @error('item.cost')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="price">Price</label>
                                    <input type="number" min="0" autocomplete="off" id="price" type="text" class="mt-1 block w-full form-input @error('item.price') border-red-500 @enderror " wire:model.defer="item.price" autocomplete="price" />
                                    @error('item.price')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8 border-gray-200">
                    <div class="flex items-start flex-col sm:flex-row">
                        <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                            <h3 class="text-lg font-medium text-gray-900">Property</h3>
                            <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                        </div>
                        <div class="sm:w-4/6 w-full flex flex-wrap">
                            <div class="sm:w-1/3 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="qty">QTY</label>
                                    <input type="number" min="0" autocomplete="off" id="qty" type="text" class="mt-1 block w-full form-input @error('item.qty') border-red-500 @enderror " wire:model.defer="item.qty" autocomplete="qty" />
                                    @error('item.qty')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/3 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="supplier">Supplier</label>
                                    <select class="form-select w-full @error('item.supplier_id') border-red-500 @enderror" wire:model.defer="item.supplier_id" id="supplier">
                                        <option selected>Choose one supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item.supplier_id')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/3 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="uomId">Stock Unit</label>
                                    <select class="form-select w-full @error('item.uom_id') border-red-500 @enderror" wire:model.defer="item.uom_id" id="uom">
                                        <option selected>Choose one uom</option>
                                        @foreach ($uoms as $uom)
                                            <option value="{{$uom->id}}">{{$uom->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item.uom_id')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="brandId">Brand</label>
                                    <select class="form-select w-full @error('item.brand_id') border-red-500 @enderror" wire:model.defer="item.brand_id" id="brand">
                                        <option selected>Choose one brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item.brand_id')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="discontinue">Discontinue</label>
                                    <label class="mr-3 font-semibold cursor-pointer text-sm text-gray-700"><input class="mr-1 " name="discontinue" value="yes" selected type="radio" wire:model.defer="item.discontinue">Yes</label>
                                    <label class="font-semibold cursor-pointer text-sm text-gray-700"><input class="mr-1 " name="discontinue" value="no" type="radio" wire:model.defer="item.discontinue">No</label>
                                    @error('item.discontinue')
                                        <span class="text-sm text-red-600 block">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8 border-gray-200">
                    <div class="flex items-start flex-col sm:flex-row">
                        <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                            <h3 class="text-lg font-medium text-gray-900">Description</h3>
                            <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                        </div>
                        <div class="sm:w-4/6 w-full flex flex-wrap">
                            <div class="w-full px-2 mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block text-sm font-medium mb-1" for="description">Description</label>
                                    <textarea id="description" wire:model.defer="item.description" class="form-input @error('item.description') border-red-500 @enderror  rounded-md shadow-sm w-full" cols="30" rows="5"></textarea>
                                    @error('item.description')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <div class="flex items-start flex-col sm:flex-row">
                        <div class="w-2/6 px-2 hidden sm:block"></div>
                        <div class="w-4/6 px-2 flex">
                            <button class="btn btn-indigo mr-2" type="submit" wire:loading.attr="disabled">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg> Save
                            </button>
                            <button class="btn btn-secondary text-indigo-500" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>