<div class="flex flex-wrap">
    <div class="w-full p-2">
        <x-jet-label>Customer</x-jet-label>
        <select class="form-select w-full" name="customer" id="customer" wire:model="customer">
            @foreach ($customers as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="customer"></x-jet-input-error>
    </div>
    <div class="w-full p-2">
        <x-jet-label>Note</x-jet-label>
        <textarea wire:model="note" class="form-input rounded-md shadow-sm w-full"></textarea> 
        <x-jet-input-error for="note"></x-jet-input-error>
    </div>
</div>