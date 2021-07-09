@extends('layouts.admin', ['title' => 'Actes'])
@section('content')
<!-- New Table -->
    <div class="w-full border overflow-hidden rounded-lg shadow-xs">
        @livewire('deeds-table-view')
    </div>
@endsection
