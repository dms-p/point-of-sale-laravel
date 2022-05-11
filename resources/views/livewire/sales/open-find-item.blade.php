<div>
    <table class="w-full">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td class="p-2">{{$item->name}}</td>
                    <td class="p-2">{{$item->price}}</td>
                    <td class="p-2">
                        <x-jet-button wire:loading.attr="disabled" wire:click="add('{{$item->id}}')">add</x-jet-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$items->links()}}
</div>
