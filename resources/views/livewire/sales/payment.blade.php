<div class="flex flex-wrap">
    <div class="w-full p-2">
        <x-jet-label>Customer</x-jet-label>
        <select class="form-select w-full" name="customer" id="customer" wire:model="customer">
            @foreach ($customers as $data)
                <option wire:key='{{$data->id}}' value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="customer"></x-jet-input-error>
    </div>
    <div class="sm:w-1/2 w-full p-2">
        <x-jet-label class="mt-2">Grand Total</x-jet-label>
        <input class="w-full form-input" type="text" id="grand_total" readonly wire:model.defer="grand_total"/>
        <x-jet-input-error for="grand_total"></x-jet-input-error>
    </div>
    <div class="sm:w-1/2 w-full p-2">
        <x-jet-label class="mt-2">Paid</x-jet-label>
        <input class="w-full form-input" type="number" id="paid" wire:model="paid" autocomplete="off" autofocus/>
        <x-jet-input-error for="paid"></x-jet-input-error>
    </div>
    <div class="w-full p-2">
        <x-jet-label class="mt-2">change</x-jet-label>
        <input class="w-full form-input" type="number" id="change" readonly wire:model="changes"/>
        <x-jet-input-error for="changes"></x-jet-input-error>
    </div>
    <div class="w-full p-2">
        <x-jet-label>Note</x-jet-label>
        <textarea wire:model="note" class="form-input rounded-md shadow-sm w-full"></textarea> 
        <x-jet-input-error for="note"></x-jet-input-error>
    </div>
</div>