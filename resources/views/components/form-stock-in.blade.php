<div>
    
    <x-jet-button wire:click="modalOn"  wire:loading.attr="disabled">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Add Stock In
    </x-jet-button>
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if ($stockInId==null)
                Create new Stock In
            @else
                Edit Stock In
            @endif
        </x-slot>
        <x-slot name="content">
            <div class="flex items-start sm:flex-row flex-col sm:justify-around">
                <x-jet-label class="w-full sm:w-2/6 text-left sm:text-right p-1" for="item_id" value="{{ __('Item') }}" />
                <div class="sm:w-4/6 w-full p-1 relative">
                    <x-select model="stockIn.item_id">
                        <option >choose one</option>
                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->code}} - {{$item->name}}</option>
                        @endforeach
                    </x-select>
                    <x-jet-input-error for="stockIn.item_id" class="mt-2" />
                </div>
            </div>
            <div class="flex items-start sm:flex-row flex-col sm:justify-around">
                <x-jet-label class="w-full sm:w-2/6 text-left sm:text-right p-1" for="qty" value="{{ __('Qty') }}" />
                <div class="sm:w-4/6 w-full p-1 relative">
                    <x-jet-input id="qty" type="text" class="mt-1 block w-full" wire:model.defer="stockIn.qty" autocomplete="off" />
                    <x-jet-input-error for="stockIn.qty" class="mt-2" />
                </div>
            </div>
            <div class="flex items-start sm:flex-row flex-col sm:justify-around">
                <x-jet-label class="w-full sm:w-2/6 text-left sm:text-right p-1" for="date" value="{{ __('Date') }}" />
                <div class="sm:w-4/6 w-full p-1 relative">
                    <x-jet-input id="date" type="date" class="mt-1 block w-full" wire:model.defer="stockIn.date" autocomplete="off" />
                    <x-jet-input-error for="stockIn.date" class="mt-2" />
                </div>
            </div>
            <div class="flex items-start sm:flex-row flex-col sm:justify-around">
                <x-jet-label class="w-full sm:w-2/6 text-left sm:text-right p-1" for="note" value="{{ __('Note') }}" />
                <div class="sm:w-4/6 w-full p-1 relative">
                    <textarea id="note" class="form-input w-full rounded-md shadow-sm" type="text" class="mt-1 block w-full" wire:model.defer="stockIn.note"></textarea>
                    <x-jet-input-error for="stockIn.note" class="mt-2" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="modalOff">Cancel</x-jet-secondary-button>
            <x-jet-button class="ml-2" type="button" wire:click="store" wire:loading.attr="disabled">Save</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>