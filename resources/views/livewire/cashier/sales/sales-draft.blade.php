<div wire:keydown.delete="cancel" wire:keydown.p="payment">
    <x-jet-dialog-modal maxWidth="sm" wire:model="modal">
        <x-slot name="title">
            {{$componentModal}}
        </x-slot>
        <x-slot name="content">
            @switch($componentModal)
                @case('Discount')
                    @livewire('sales.discount',['key'=>$key])
                    @break
                @case('Tax')
                    @livewire('sales.tax',['key'=>$key])
                    @break
                @case('Edit')
                    @livewire('sales.edit-item',['key'=>$key,'dataItem'=>$dataItem])
                    @break
                @case('Payment')
                    @livewire('sales.payment',['key'=>$key])
                    @break
                @case('Save')
                    @livewire('sales.save',['key'=>$key])
                    @break
                @case('ShippingCost')
                    @livewire('sales.shipping-cost',['key'=>$key])
                    @break
            @endswitch
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-secondary mr-2" wire:click="modalOff">Cancel</button>
            <button class="btn btn-blue" class="ml-2" type="button" wire:click="$emit('{{$componentModal}}')" wire:loading.attr="disabled">Save</button class="btn btn-blue">
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Sales #{{$sales->code}}</h1>
    </header>
    <div class="grid grid-cols-1 mt-3 gap-4 w-full">
        <div class="p-3 bg-white border-blue-600 border-l-4 rounded-md shadow overflow-hidden grid grid-cols-4 grid-rows-1 gap-4 sm:rounded-md w-full">
            <div id="">
                <label class="block text-sm font-medium mb-1" for="store">Store</label>
                <input id="store" readonly type="text" value="{{$store->name}}" class="mt-1 block w-full form-input" autocomplete="off" />
            </div>
            <div id="">
                <label class="block text-sm font-medium mb-1" for="sales">Sales</label>
                <input id="sales" readonly type="text" value="{{Auth::user()->name}}" class="mt-1 block w-full form-input" autocomplete="off" />
            </div>
            <div id="">
                <label class="block text-sm font-medium mb-1" for="date">Date</label>
                <input id="date" readonly type="text" value="{{date('d-m-Y')}}" class="mt-1 block w-full form-input" autocomplete="off" />
            </div>
            <div id="">
                <label class="block text-sm font-medium mb-1" for="noReference">No Refrence</label>
                <input id="noReference" readonly type="text" value="{{$sales->code}}" class="mt-1 block w-full form-input" autocomplete="off" />
            </div>
        </div>
        <div class="flex items-start w-full">
            <div class="p-1 sm:w-4/6 w-full">
                <div class=" bg-white p-3 rounded-md shadow overflow-hidden sm:rounded-md">
                    <div class="flex w-full justify-between items-center border-b border-gray-200 pb-2">
                        <input class="form-input" autofocus placeholder="Scan or Type Code" type="search" wire:keydown.enter="addItem" wire:model.defer="code" class="mt-1 block" autocomplete="off" />
                    </div>
                    <div id="table" class="pt-2">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left p-2">Product</th>
                                    <th class="p-2">Qty</th>
                                    <th class="p-2">Discount</th>
                                    <th class="p-2">Tax</th>
                                    <th class="p-2">Total</th>
                                    <th class="p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $key => $cart)
                                    <tr :key="{{$key}}">
                                        <td class="p-2">
                                            <p class="font-bold text-gray-700">{{$cart['name']}}</p>
                                            <span class="text-xs text-blue-600">@ Rp.{{number_format($cart['price'])}}</span>
                                        </td>
                                        <td class="p-2 text-center">{{$cart['quantity']}}</td>
                                        <td class="text-center">{{str_replace('-','',$cart->conditions['discount']->getValue())}}</td>
                                        <td class="text-center">{{str_replace('+','',$cart->conditions['tax']->getValue())}}</td>
                                        <td class="text-center">Rp. {{number_format($cart->getPriceSumWithConditions())}}</td>
                                        <td class="p-2 text-center">
                                            <button class="btn btn-secondary btn-sm text-red-500" wire:click="$emit('confirmRemove',{{$cart['id']}})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            <button class="btn btn-secondary btn-sm text-blue-500" wire:click="openEdit({{$cart['id']}})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-2 py-8">
                                            <img class="mx-auto" src="{{asset('images/emptycart.svg')}}" alt="">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="p-1 sm:w-2/6 w-full" id="ordersumary" >
                <div class="bg-white py-3 px-5 rounded-md shadow overflow-hidden sm:rounded-md">
                    <div class="w-full flex justify-between items-center">
                        <h3 class="text-lg font-semibold ">Order Summary <span class="text-sm py-1 px-2 rounded-md bg-blue-500 text-white">{{$carts->count()}}</span></h3>
                        <button wire:click="$emit('confirmClear')" class="btn btn-red" wire:loading.attr="disabled" @if ($summary['total']==0) disabled @endif>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                    <hr class="border-dashed mb-2 mt-4">
                    <table class="w-full">
                        <tr>
                            <td class="p-1 text-sm">Sub Total</td>
                            <th class="text-right p-1 text-sm">
                                {{number_format($summary['subtotal'])}}
                            </th>
                        </tr>
                        <tr>
                            <td class="p-1 text-sm">Tax</td>
                            <th class="text-right p-1 text-sm">
                                {{str_replace('+','',$summary['tax'])}}
                            </th>
                        </tr>
                        <tr>
                            <td class="p-1 text-sm">Discount</td>
                            <th class="text-right p-1 text-sm">
                                {{str_replace('-','',$summary['discount'])}}
                            </th>
                        </tr>
                        <tr>
                            <td class="p-1 text-sm">Shipping Cost</td>
                            <th class="text-right p-1 text-sm">
                                {{str_replace('+','',$summary['shipping_cost'])}}
                            </th>
                        </tr>
                    </table>
                    <hr class="border-dashed mb-2 mt-4">
                    <button class="btn btn-indigo w-full mb-2" @if ($summary['total']==0) disabled @endif wire:click="openPayment" wire:loading.attr="disabled" wire:target="openPayment">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>@if ($summary['total']==0)Payment @else Rp. {{number_format($summary['total'])}},- @endif
                    </button>
                    <div class="flex justify-between">
                        <button class="btn btn-secondary text-red-500" wire:loading.attr="disabled" @if ($summary['total']==0) disabled @endif wire:click="openShippingCost">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                        </button>
                        <button class="btn btn-secondary text-blue-500" wire:loading.attr="disabled" @if ($summary['total']==0) disabled @endif wire:click="openDiscount">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        </button>
                        <button class="btn btn-secondary text-green-500" wire:loading.attr="disabled" @if ($summary['total']==0) disabled @endif wire:click="openTax">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path></svg>
                        </button>
                        <button class="btn btn-secondary text-orange-500" wire:loading.attr="disabled" @if ($summary['total']==0) disabled @endif wire:click="openSave">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
