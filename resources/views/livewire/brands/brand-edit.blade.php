<div>
    <div class="pt-6 pb-2 px-3 bg-white rounded-md shadow overflow-hidden sm:rounded-md w-full">
        <form wire:submit.prevent='update' >
            <!--name-->
            <div>
                <label class="block text-sm font-medium mb-1" for="name">Name</label>
                <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('brand.name') border-red-500 @enderror " wire:model.defer="brand.name" autocomplete="off" />
                @error('brand.name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <!--description-->
            <div>
                <label class="block text-sm font-medium mb-1" for="description">Description</label>
                <textarea id="description" wire:model.defer="brand.description" class="form-input @error('brand.description') border-red-500 @enderror  rounded-md shadow-sm w-full" cols="30" rows="5"></textarea>
                @error('brand.description')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <hr class="my-2">
            <button class="btn btn-green mr-2" type="submit" wire:target="update" wire:loading.attr="disabled">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg> Update
            </button>
            <button wire:click="cancel" class="btn btn-secondary text-green-400 mr-2" type="button">
                Cancel
            </button>
        </form>
    </div>
</div>