<div>
    <x-jet-label class="mt-2">Item Name</x-jet-label>
    <x-jet-input class="w-full" type="text" disabled wire:model.defer="name"></x-jet-input>
    <div class="grid gap-2 grid-cols-2 grid-rows-2">
        <div>
            <x-jet-label class="mt-2">Price</x-jet-label>
            <x-jet-input class="w-full" type="text" wire:model.defer="price"></x-jet-input>
        </div>
        <div>
            <x-jet-input-error for="price"></x-jet-input-error>
            <x-jet-label class="mt-2">Quantity</x-jet-label>
            <x-jet-input class="w-full" type="text" wire:model.defer="quantity"></x-jet-input>
            <x-jet-input-error for="quantity"></x-jet-input-error>
        </div>
        <div>
            <x-jet-label class="mt-2">Discount</x-jet-label>
            <x-jet-input class="w-full" type="text" wire:model.defer="discount"></x-jet-input>
            <x-jet-input-error for="discount"></x-jet-input-error>
        </div>
        <div>
            <x-jet-label class="mt-2">Tax</x-jet-label>
            <x-jet-input class="w-full" type="text" wire:model.defer="tax"></x-jet-input>
            <x-jet-input-error for="tax"></x-jet-input-error>
        </div>
    </div>
</div>
