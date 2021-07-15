@extends('layouts.admin', ['title' => 'Actes'])
@section('content')
<!-- New Table -->
<div class="mb-4 flex justify-end gap-2">
    <a href="{{ route('admin.deeds.create') }}"
        class="flex items-center px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Créer
    </a>
    @livewire('deeds.total-deleted-deeds-count')
</div>
    <div class="w-full border rounded-lg shadow-xs">
        <div class="flex justify-between">
            <h3 class="text-xl text-center text-indigo-600 font-bold md:ml-3 md:mt-3 md:text-left">Liste des actes</h3>
            <a href="#" onclick="Livewire.emit('export')"
                class="flex items-center px-3 py-2 m-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>Exporter
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
