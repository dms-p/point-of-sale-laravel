@if (Auth::user()->role->name=='Admin')
    @include('layouts.admin')
@else
    @include('layouts.cashier')
@endif