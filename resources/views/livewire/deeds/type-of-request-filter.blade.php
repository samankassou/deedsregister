<div class="relative" x-data="{open: false}" @click.away="open = false">
    <button @click="open = !open"
        class="flex flex-row justify-between px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
        <span class="select-none">Type de demande</span>

        <svg x-show="!open" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" /></svg>
        <svg x-show="open" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                clip-rule="evenodd" /></svg>
    </button>
    <div x-show="open" class="absolute w-auto py-2 mt-2 bg-white rounded-lg shadow-xl">
        <span class="ml-2 text-gray-500 text-sm">Affiner les résultats par type</span>
        <label
            class="w-full inline-flex items-center mt-3 px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white cursor-pointer rounded-sm">
            <input type="checkbox" class="rounded-full h-5 w-5"><span class="ml-2">Tout</span>
        </label>
        @foreach ($typesOfRequests as $type)
            <label wire:click="addFilter"
                class="w-full inline-flex items-center mt-3 px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white cursor-pointer rounded-sm">
                <input type="checkbox" class="rounded-full h-5 w-5">
                <span class="ml-2">{{ $type->name }}</span>
            </label>
        @endforeach

    </div>
</div>
