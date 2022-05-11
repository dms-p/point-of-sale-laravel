<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Transaction</h1>
        <button type="button" class="btn btn-indigo" wire:loading.attr="disabled" wire:click="newSales">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Create new Transcation
        </button>
    </header>
    <div class="bg-white mt-3 py-2 overflow-hidden rounded-lg shadow">
        <div class="w-full flex py-2 px-4 mb-2 justify-between items-center">
            <select class="form-select" wire:model="listCount">
                <option value="5">5</option>
                    <option selected value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
            </select>
            <select class="form-select" wire:model="statusId">
                <option selected value>All Status</option>
                @foreach ($status as $state)
                    <option value="{{$state}}">{{$state}}</option>
                @endforeach
            </select>
            <input type="text" wire:model="search" class="form-input">
        </div>
        <div class="">
            <table class="w-full mb-3">
                <thead>
                    <tr class="bg-gray-200 bg-opacity-50 text-gray-500 font-normal text-sm antialiased border-b border-t border-gray-200">
                        <th class="px-4 py-2 text-left">Customer</th>
                        <th class="px-4 py-2 text-left">User</th>
                        <th class="px-4 py-2 text-left">Grand Total</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $sale)
                        <tr class="bg-white font-normal hover:bg-gray-50 antialiased border-b border-gray-200">
                            <td class="px-4 py-2 text-sm">{{$sale->customer->name}}<br><span class="text-gray-500 text-xs"><b class="text-indigo-500">{{$sale->code}}</b></span></td>
                            <td class="px-4 py-2 text-sm">{{$sale->user->name}}</td>
                            <td class="px-4 py-2 text-sm">{{$sale->grand_total}}</td>
                            <td class="px-4 py-2 text-sm"><x-badge-sales status="{{$sale->status}}"></x-badge-sales></td>
                            <td class="px-4 py-2 text-sm">{{date_format($sale->created_at,'d-m-Y')}}</td>
                            <td class="px-4 py-2 text-sm text-left">
                                <a class="btn-sm btn-secondary" href="{{route('salesCashier.draft',$sale->slug)}}">
                                    <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <a class="btn-sm btn-secondary" href="{{route('salesCashier.show',$sale->slug)}}">
                                    <svg class="w-4 h-4 stroke-current text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <x-no-result count="6"></x-no-result>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="py-3">
        {{$sales->links()}}
    </div>
</div>