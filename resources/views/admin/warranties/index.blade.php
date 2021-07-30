@extends('layouts.admin', ['title' => 'Garanties'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs">
    <div class="flex justify-start">
        <h3 class="text-xl text-center text-indigo-600 font-bold md:ml-3 md:mt-3 md:text-left">Liste des garanties</h3>
    </div>
    @livewire('warranty')
</div>
@endsection
