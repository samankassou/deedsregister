@extends('layouts.admin', ['title' => 'Agences'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs">
    @livewire('agency')
</div>
@endsection
