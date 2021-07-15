@extends('layouts.admin', ['title' => 'Garanties'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs">
    @livewire('warranty')
</div>
@endsection
