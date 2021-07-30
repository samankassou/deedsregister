@extends('layouts.admin', ['title' => 'Paramètres'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs">
    @livewire('settings.index')
</div>
@endsection
