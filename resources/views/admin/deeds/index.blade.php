@extends('layouts.admin', ['title' => 'Actes'])
@section('content')
<!-- New Table -->
<div class="mb-4 flex justify-end gap-2">
    <a href="{{ route('admin.deeds.create') }}"
        class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Créer
    </a>
    @livewire('deeds.total-deleted-deeds-count')
</div>
    <div class="w-full border overflow-x-scroll rounded-lg shadow-xs">
        <h3 class="text-xl text-center text-indigo-600 font-bold md:ml-3 md:mt-3 md:text-left">Liste des actes</h3>
        @livewire('deeds.deeds-table-view')
    </div>
@endsection
