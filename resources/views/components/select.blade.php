<div class="relative">
    <select wire:model="{{$model}}" class="px-3 pr-8 w-full appearance-none py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" id="">
        {{$slot}}
    </select>
    <div class="pointer-events-none flex items-center px-2 right-0 absolute inset-y-0">
        <svg class="w4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </div>
</div>