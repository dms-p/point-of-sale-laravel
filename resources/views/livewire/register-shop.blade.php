<div>
    <div id="header" class="flex justify-center mb-4">
        <a href="#"><img src="{{asset('images/logo.png')}}" alt="genta pos"></a>
    </div>
    <div class="p-1 w-full">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-4 py-8">
            <form wire:submit.prevent="save">
                <div class="grid gap-4 grid-cols-12">
                    <div class="col-span-5">
                        <h3 class="text-lg font-medium text-gray-900">Admin</h3>
                        <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                    </div>
                    <div class="col-span-7">
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="name">Name</label>
                            <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('name') border-red-500 @enderror " wire:model.defer="name" autocomplete="off" />
                            @error('name')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="email">email</label>
                            <input type="input" autocomplete="off" id="email" type="text" class="mt-1 block w-full form-input @error('email') border-red-500 @enderror " wire:model.defer="email" autocomplete="off" />
                            @error('email')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="password">password</label>
                            <input type="input" autocomplete="off" id="password" type="text" class="mt-1 block w-full form-input @error('password') border-red-500 @enderror " wire:model.defer="password" autocomplete="off" />
                            @error('password')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="passwordConfirmation">password Confirmation</label>
                            <input type="input" autocomplete="off" id="passwordConfirmation" type="text" class="mt-1 block w-full form-input @error('passwordConfirmation') border-red-500 @enderror " wire:model.defer="passwordConfirmation" autocomplete="off" />
                            @error('passwordConfirmation')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr class="my-8 border-gray-200">
                <div class="grid gap-4 grid-cols-12 mt-6">
                    <div class="col-span-5">
                        <h3 class="text-lg font-medium text-gray-900">Shop</h3>
                        <p class="text-gray-500 text-sm">Update your account's profile information and email address</p>
                    </div>
                    <div class="col-span-7">
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="nameStore">Name Store</label>
                            <input type="input" autocomplete="off" id="nameStore" type="text" class="mt-1 block w-full form-input @error('nameStore') border-red-500 @enderror " wire:model.defer="nameStore" autocomplete="off" />
                            @error('nameStore')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="phone">Phone</label>
                            <input type="input" autocomplete="off" id="phone" type="text" class="mt-1 block w-full form-input @error('phone') border-red-500 @enderror " wire:model.defer="phone" autocomplete="off" />
                            @error('phone')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="emailStore">E-mail</label>
                            <input type="input" autocomplete="off" id="emailStore" type="text" class="mt-1 block w-full form-input @error('emailStore') border-red-500 @enderror " wire:model.defer="emailStore" autocomplete="off" />
                            @error('emailStore')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium mb-1" for="address">Address</label>
                            <textarea autocomplete="off" id="address" type="text" class="mt-1 block w-full form-input @error('address') border-red-500 @enderror " wire:model.defer="address" autocomplete="off"></textarea>
                            @error('address')
                                <span class="text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 grid-cols-12 mt-6">
                    <div class="col-span-5"></div>
                    <div class="col-span-7">
                        <button class="btn btn-indigo mr-2" type="submit" wire:loading.attr="disabled">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg> Save
                        </button>
                        <button type="reset" class="btn btn-secondary text-indigo-500">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
