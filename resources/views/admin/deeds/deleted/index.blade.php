@extends('layouts.admin', ['title' => 'Actes supprimés'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs">
    @livewire('deleted-deeds-table-view')
</div>
@endsection
