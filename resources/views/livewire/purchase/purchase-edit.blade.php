<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Draft Purchase</h1>
    </header>
    <x-jet-dialog-modal maxWidth="sm" wire:model="modal">
        <x-slot name="title">
            Update Item Cart
        </x-slot>
        <x-slot name="content"> 
            <div class="mb-2">
                <input type="hidden" autocomplete="off" id="name" class="mt-1 block w-full form-input @error('singleItem.id') border-red-500 @enderror " wire:model.defer="singleItem.id" autocomplete="off" />
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="name">Name</label>
                <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('singleItem.name') border-red-500 @enderror " wire:model.defer="singleItem.name" autocomplete="off" />
                @error('singleItem.name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="price">price</label>
                <input type="input" autocomplete="off" id="price" type="text" class="mt-1 block w-full form-input @error('singleItem.price') border-red-500 @enderror " wire:model.defer="singleItem.price" autocomplete="off" />
                @error('singleItem.price')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="discount">discount</label>
                <input type="input" autocomplete="off" id="discount" type="text" class="mt-1 block w-full form-input @error('singleItem.discount') border-red-500 @enderror " wire:model.defer="singleItem.discount" autocomplete="off" />
                @error('singleItem.discount')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="tax">tax</label>
                <input type="input" autocomplete="off" id="tax" type="text" class="mt-1 block w-full form-input @error('singleItem.tax') border-red-500 @enderror " wire:model.defer="singleItem.tax" autocomplete="off" />
                @error('singleItem.tax')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1" for="quantity">quantity</label>
                <input type="input" autocomplete="off" id="quantity" type="text" class="mt-1 block w-full form-input @error('singleItem.quantity') border-red-500 @enderror " wire:model.defer="singleItem.quantity" autocomplete="off" />
                @error('singleItem.quantity')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class=" btn btn-secondary text-indigo-500" wire:click="modalOff">Cancel</button>
            <button class="ml-2 btn btn-indigo" type="button" wire:target="update" wire:click="update" wire:loading.attr="disabled">Save</button>
        </x-slot>
    </x-jet-dialog-modal>
    <main>
        <div class="grid gap-4 grid-cols-12">
            <div class="col-span-8">
                <div class="bg-white p-6 overflow-hidden shadow sm:rounded-lg">
                    <div class="max-w-screen-md">
                        <div class="grid gap-10 grid-cols-12">
                            <div class="col-span-6">
                                <div class="mb-2">
                                    <label for="" class="block text-sm font-medium mb-1">Reference No</label>
                                    <input type="text" readonly name="" wire:model.defer="purchase.code" class="form-input w-full" id="">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="block text-sm font-medium mb-1">Date Required</label>
                                    <input type="date" name="" wire:model.defer="purchase.date_required" class="form-input w-full @error('purchase.date_required') border-red-500 @enderror" id="">
                                    @error('purchase.date_required')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div class="mb-2">
                                    <label for="" class="block text-sm font-medium mb-1">Supplier</label>
                                    <select name="" wire:model.defer="purchase.supplier_id" class="form-select w-full @error('purchase.supplier_id') border-red-500 @enderror" id="">
                                        <option value="">--Choose Supplier--</option>
                                        @foreach ($suppliers as $supplier)
                                            @if ($supplier->id!=1)
                                                <option wire:key="{{$supplier->id}}" value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('purchase.supplier_id')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="" class="block text-sm font-medium mb-1">Status</label>
                                    <select wire:model.defer="purchase.status" name="" class="form-select w-full @error('purchase.status') border-red-500 @enderror" id="">
                                        <option value="">--Choose Status--</option>
                                        @foreach ($status as $data)
                                            <option value="{{$data}}">{{$data}}</option>
                                        @endforeach
                                    </select>
                                    @error('purchase.status')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white mt-4 px-6 py-3 overflow-hidden shadow sm:rounded-lg">
                    <form wire:submit.prevent="addItem">
                        <div class="grid gap-4 grid-cols-12">
                            <div class="col-span-4">
                                <div class="">
                                    <select name="itemId" wire:model.defer="itemId" class="form-select w-full @error('itemId') border-red-500 @enderror" id="">
                                        <option value="">--Pilih Item--</option>
                                        @foreach ($items as $item)
                                            <option :key="{{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('itemId')
                                        <span class="text-sm text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="mb-2">
                                    <button type="submit" wire:loading.attr="disabled" wire:target='addItem' class="btn btn-indigo">Add Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-white mt-4 p-6 overflow-hidden shadow sm:rounded-lg">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-left">Item Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Subtotal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr wire:key="{{$cart->id}}">
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$cart->name}}</td>
                                    <td class="text-center">{{'Rp. '.number_format($cart->price)}}</td>
                                    <td class="text-center">{{$cart->quantity}}</td>
                                    <td class="text-center">{{str_replace('-','',$cart->conditions['discount']->getValue())}}</td>
                                    <td class="text-center">{{str_replace('+','',$cart->conditions['tax']->getValue())}}</td>
                                    <td class="text-center">Rp. {{number_format($cart->getPriceSumWithConditions())}}</td>
                                    <td>
                                        <div class="flex justify-center">
                                            <button type="button" wire:click="edit({{$cart->id}})" class="btn-sm btn-secondary mr-2">
                                                <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button type="button" wire:click="$emit('confirmRemove',{{$cart->id}})" class="btn-sm btn-secondary">
                                                <svg class="w-4 h-4 stroke-current text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-8">
                                        <img class="mx-auto" src="{{asset('images/emptycart.svg')}}" alt="">
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="grid mt-10 gap-4 grid-cols-12">
                        <div class="col-span-4">
                            <div class="mb-2">
                                <label for="" class="block text-sm font-medium mb-1">Tax</label>
                                <input type="integer" name="" wire:model="purchase.tax" class="form-input w-full @error('purchase.tax') border-red-500 @enderror" id="">
                                @error('purchase.tax')
                                    <span class="text-sm text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="mb-2">
                                <label for="" class="block text-sm font-medium mb-1">Discount</label>
                                <input type="integer" name="" wire:model="purchase.discount" class="form-input w-full @error('purchase.discount') border-red-500 @enderror" id="">
                                @error('purchase.dsicount')
                                    <span class="text-sm text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="mb-2">
                                <label for="" class="block text-sm font-medium mb-1">Shipping Cost</label>
                                <input type="integer" wire:model="purchase.shipping_cost" name="" class="form-input w-full @error('purchase.shipping_cost') border-red-500 @enderror" id="">
                                @error('purchase.shipping_cost')
                                    <span class="text-sm text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="">
                                <label for="" class="block text-sm font-medium mb-1">Note</label>
                                <textarea type="input" name="" wire:model.defer="purchase.note" class="form-input w-full @error('purchase.note') border-red-500 @enderror" id=""></textarea>
                                @error('purchase.note')
                                    <span class="text-sm text-red-600">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-6 py-2 bg-gray-50 border-t border-gray-100">
                        <h2 class="text-gray-600 tracking-wide text-lg font-bold">Summary<span class="ml-2 px-2 bg-green-500 text-white rounded">{{$carts->count()}}</span></h2>
                    </div>
                    <div class="p-6">
                        <table>
                            <tr>
                                <td class="text-left text-gray-500 font-semibold">Total</td>
                                <th class="text-gray-500 font-semibold text-left">Rp. {{number_format($summary['subtotal'])}}</th>
                            </tr>
                            <tr>
                                <td class="text-left text-gray-500 font-semibold">Discount</td>
                                <th class="text-gray-500 font-semibold text-left">{{$summary['discount']}}</th>
                            </tr>
                            <tr>
                                <td class="text-left text-gray-500 font-semibold">Tax</td>
                                <th class="text-gray-500 font-semibold text-left">{{$summary['tax']}}</th>
                            </tr>
                            <tr>
                                <td class="text-left text-gray-500 font-semibold">Shipping Cost</td>
                                <th class="text-gray-500 font-semibold text-left">{{$summary['shipping_cost']}}</th>
                            </tr>
                            <tr>
                                <th class="text-left" colspan="2">
                                    <span class="text-gray-500">Grand Total</span>
                                    <h2 class="text-2xl">Rp. {{number_format($summary['total'])}},-</h2>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="px-6 py-2 bg-gray-50 border-t border-gray-100">
                        <button class="btn btn-indigo" wire:click="save" wire:target="save" wire:loading.attr="disabled">Save</button>
                        <button class="btn btn-red"  wire:click="$emit('confirmClear')" wire:loading.attr="disabled">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>