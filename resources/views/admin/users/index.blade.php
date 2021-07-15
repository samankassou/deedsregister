@extends('layouts.admin', ['title' => 'Utilisateurs'])
@section('content')
    <!-- New Table -->
    <div class="w-full border overflow-hidden rounded-lg shadow-xs">
        @livewire('user')
    </div>
@endsection
