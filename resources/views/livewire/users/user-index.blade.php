<div>
    <!-- Page Heading -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="font-semibold text-xl text-gray-800">Cashiers</h1>
        <a class="btn btn-indigo" href="{{route('user.create')}}">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>Add New Cashier
        </a>
    </header>
    <main>
        <div class="p-1 w-full">
            <div class="card bg-white">
                <div class="card-header flex pt-2 pb-3 px-4 justify-between items-center">
                    <select wire:model="listCount" class="form-select" id="">
                        <option value="5">5</option>
                        <option selected value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                    <input type="search" wire:model="keyword" class="form-input">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>
                                    <div class="inline-flex items-center">
                                        <img class="h-8 w-8 mx-auto rounded-full object-cover mr-4" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                        <div>
                                            <p class="font-bold tracking-wide text-gray-800">{{$user->name}}</p>
                                            <span class="text-indigo-600 text-xs font-semibold">{{$user->code}}</span>
                                        </div>
                                    </div>    
                                </td>
                                <td class="text-center text-cool-gray-500">{{$user->role->name}}</td>
                                <td class="text-center text-cool-gray-500">{{$user->email}}</td>
                                <td class="px-4 py-2">
                                    <div class="flex justify-center">
                                        <a href="{{route('user.edit',$user->id)}}" class="btn-sm btn-secondary mr-2">
                                            <svg class="w-4 h-4 stroke-current text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        <button wire:click="$emit('confirmDelete',{{$user->id}})" class="btn-sm btn-secondary">
                                            <svg class="w-4 h-4 stroke-current text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center py-3">
                                        <img src="{{asset('images/no-data.webp')}}" class="w-1/2 mx-auto" alt="No data">
                                        <h3 class="text-lg text-gray-700 font-bold">Sorry, Data Not Found</h3>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{$users->links()}}
            </div>
        </div>
    </main>
</div>