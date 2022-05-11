<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Settings</h1>
    </header>
    <main>
        <div class="p-1 w-full">
            <div class="bg-white py-2 overflow-hidden shadow sm:rounded-lg">
                <form wire:submit.prevent="save">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-start flex-col sm:flex-row">
                            <div class="sm:w-2/6 w-full px-2 mb-3 sm:px-3">
                                <h3 class="text-lg font-medium text-gray-900">Store Information</h3>
                                <p class="text-gray-500 text-sm">Update your Store Information</p>
                            </div>
                            <div class="sm:w-4/6 w-full flex flex-wrap">
                                <div class="w-full px-2 mb-3">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="name">Name</label>
                                        <input type="input" autocomplete="off" id="name" type="text" class="mt-1 block w-full form-input @error('name') border-red-500 @enderror " wire:model.defer="name" autocomplete="off" />
                                        @error('name')
                                            <span class="text-sm text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full px-2 mb-3">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="email">E-mail</label>
                                        <input type="input" autocomplete="off" id="email" type="text" class="mt-1 block w-full form-input @error('email') border-red-500 @enderror " wire:model.defer="email"/>
                                        @error('email')
                                            <span class="text-sm text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full px-2 mb-3">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="phone">Phone</label>
                                        <input type="input" autocomplete="off" id="phone" type="text" class="mt-1 block w-full form-input @error('phone') border-red-500 @enderror " wire:model.defer="phone"/>
                                        @error('phone')
                                            <span class="text-sm text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full px-2 mb-3">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="address">Address</label>
                                        <textarea autocomplete="off" id="address" type="text" class="mt-1 block w-full form-input @error('address') border-red-500 @enderror " wire:model.defer="address"></textarea>
                                        @error('address')
                                            <span class="text-sm text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full px-2 mb-3">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="footer_recipt">Footer Recipt</label>
                                        <textarea autocomplete="off" id="footer_recipt" type="text" class="mt-1 block w-full form-input @error('footer_recipt') border-red-500 @enderror " wire:model.defer="footer_recipt"></textarea>
                                        @error('footer_recipt')
                                            <span class="text-sm text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                        <div class="flex items-start flex-col sm:flex-row">
                            <div class="w-2/6 px-2 hidden sm:block"></div>
                            <div class="w-4/6 px-2 flex">
                                <button class="btn btn-indigo mr-2" type="submit" wire:target='save' wire:loading.attr="disabled">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg> Save
                                </button>
                                <button class="btn btn-secondary text-indigo-500" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>