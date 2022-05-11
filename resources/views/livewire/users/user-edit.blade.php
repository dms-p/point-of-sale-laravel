<div>
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Create new Cashier</h1>
    </header>
    <main>
        <div class="card bg-white">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-start flex-col flex-wrap sm:flex-row">
                    <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                        <h3 class="text-lg font-medium text-gray-900">General Information</h3>
                        <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                    </div>
                    <div class="sm:w-4/6 w-full flex flex-wrap ">
                        <div class="sm:w-1/2 w-full px-2 mb-3">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="user.name" autocomplete="off" />
                            <x-jet-input-error for="user.name" class="mt-2" />
                        </div>
                        <div class="sm:w-1/2 w-full px-2 mb-3">
                            <x-jet-label for="E-email" value="{{ __('E-email') }}" />
                            <x-jet-input id="E-email" type="text" class="mt-1 block w-full" wire:model.defer="user.email" autocomplete="off" />
                            <x-jet-input-error for="user.email" class="mt-2" />
                        </div>
                        <div class="sm:w-1/2 w-full px-2 mb-3">
                            <x-jet-label for="code" value="{{ __('code') }}" />
                            <x-jet-input id="code" readonly type="text" class="mt-1 block w-full" wire:model.defer="user.code" autocomplete="off" />
                            <x-jet-input-error for="user.code" class="mt-2" />
                        </div>
                        <div class="sm:w-1/2 w-full px-2 mb-3">
                            <x-jet-label for="Password" value="{{ __('Password') }}" />
                            <x-jet-input id="Password" type="text" class="mt-1 block w-full" wire:model.defer="user.password" autocomplete="off" />
                            <x-jet-input-error for="user.password" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:p-6">
                <div class="flex items-start flex-col sm:flex-row">
                    <div class="w-2/6 px-2 hidden sm:block"></div>
                    <div class="w-4/6 px-2 flex">
                        <button wire:click="store" wire:target="store" wire:loading.attr="disabled" class="btn btn-indigo">Save</button>
                        <a  href="{{route('user.index')}}" class="btn btn-secondary ml-2 text-indigo-500" type="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>