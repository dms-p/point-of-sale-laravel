<div>
    <form wire:submit.prevent='update'>
        <!--category-->
        <x-jet-label for="name" value="{{ __('Category') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="category.name" autocomplete="off" />
        <x-jet-input-error for="category.name" class="mt-2" />
        <!---description-->
        <x-jet-label class="mt-2" for="description" value="{{ __('Description') }}" />
        <textarea id="description" rows="5" class="form-input w-full rounded-md shadow-sm" class="mt-1 block w-full" wire:model.defer="category.description"></textarea>
        <x-jet-input-error for="category.description" class="mt-2" />
        <hr class="my-2">
        <button class="btn btn-green" wire:target="update" type="submit" wire:loading.attr="disabled">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg> Update
        </button>
    </form>
</div>