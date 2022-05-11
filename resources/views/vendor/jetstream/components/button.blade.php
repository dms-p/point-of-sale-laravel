@props(['bg'=>'gray'])
<button class="btn bg-{{$bg}}-500 hover:bg-{{$bg}}-600 text-white">
    {{ $slot }}
</button>
