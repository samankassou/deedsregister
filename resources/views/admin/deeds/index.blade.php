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
    <div class="w-full border rounded-lg shadow-xs">
        <div class="flex justify-between">
            <h3 class="text-xl text-center text-indigo-600 font-bold md:ml-3 md:mt-3 md:text-left">Liste des actes</h3>
            <a href="#" onclick="Livewire.emit('export')"
                class="px-3 py-2 m-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Exporter
            </a>
        </div>
        <div class="flex items-center">
            <select class="m-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" onchange="Livewire.emit('paginate', this.value)">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="10000">Tout</option>
            </select><span>Par page</span>
        </div>
        @livewire('deeds.deeds-table-view')
    </div>
@endsection
