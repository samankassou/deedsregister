<div class="mb-4 flex justify-between">
    <div>
        <a class="px-3 py-2 text-sm font-medium leading-5 text-purple-600 transition-colors duration-150 border border-purple-600 rounded-md active:bg-purple-600 hover:bg-purple-700 hover:text-white focus:outline-none focus:shadow-outline-purple"
            href="{{ url()->previous() }}">Retour</a>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('admin.deeds.index') }}"
            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Liste des actes({{ $deedsCount }})
        </a>
        <a href="{{ route('admin.deeds.deleted') }}"
            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Corbeille({{ $deletedDeedsCount }})
        </a>
    </div>
</div>
