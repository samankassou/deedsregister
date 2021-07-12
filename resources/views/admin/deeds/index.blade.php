@extends('layouts.admin', ['title' => 'Actes'])
@section('content')
<!-- New Table -->
<div class="mb-4 flex justify-end gap-2">
    <a href="{{ route('admin.deeds.create') }}"
        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Créer
    </a>
    <a href="{{ route('admin.deeds.deleted') }}"
        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Corbeille({{ $deletedDeedsCount }})
    </a>
</div>
    <div class="w-full border rounded-lg shadow-xs">
        @livewire('deeds-table-view')
    </div>
@endsection
