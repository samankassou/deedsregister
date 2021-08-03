<div id="table">

    <div class="py-4 px-3 pb-0">
        <div class="md:flex items-center">

            <div class="flex-1">
                <div class="relative text-left mb-4">
                    <label class="block">

                    </label>
                    <input
                        class="appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-3 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:border-2 border"
                        type="text" name="" placeholder="Rechercher..." autocomplete="off" wire:model="search">
                    @if ($search)
                        <div class="absolute right-0 top-0 mt-3 mr-4 text-purple-lighter">
                            <a wire:click.prevent="$set('search', '')" href="#" class="text-gray-400 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex space-x-1 flex-1 justify-end items-center mb-4">
                @if (count($selected))
                    <div class="flex space-x-1">
                        <div class="relative" x-data="{ open: false }">
                            <span @click="open = true" class="cursor-pointer">
                                <button
                                    class="border border-transparent hover:border-gray-300 focus:border-gray-300 focus:outline-none flex items-center gap-1 text-xs px-3 py-2 rounded hover:shadow-sm font-medium">
                                    Actions
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-down w-4 h-4">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                            </span>

                            <div class="bg-white shadow-lg rounded absolute top-8 right-0 border text-left z-10 w-64"
                                x-show.transition="open" @click.away="open = false" style="display: none;">
                                <div
                                    class="border-b border-t border-gray-200 bg-gray-100 text-xs font-semibold uppercase text-left px-4 py-2">
                                    {{ count($selected) }} Sélection{{ count($selected) > 1 ? 's' : '' }}
                                </div>
                                <button wire:click.prevent="showDeletePopUp" title="Supprimer"
                                    class="group flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="md:flex items-center gap-2 mb-2">
            <livewire:deeds.type-of-request-filter>

            <div class="relative" x-data="{open: false}" @click.away="open = false">
                <button @click="open = !open"
                    class="flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
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
                <div x-show="open" class="absolute w-48 py-2 mt-2 bg-white rounded-lg shadow-xl">
                    <span class="ml-2 text-gray-500 text-sm">Affiner les résultats par type</span>

                </div>
            </div>

            <div class="relative" x-data="{open: false}" @click.away="open = false">
                <button @click="open = !open"
                    class="flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
                    <span class="select-none">Pôle</span>

                    <svg x-show="!open" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" /></svg>
                    <svg x-show="open" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                            clip-rule="evenodd" /></svg>
                </button>
                <div x-show="open" class="absolute w-48 py-2 mt-2 bg-white rounded-lg shadow-xl">
                    <span class="ml-2 text-gray-500 text-sm">Affiner les résultats par type</span>
                </div>
            </div>
        </div>
        <button type="button" class="text-indigo-500 text-md mb-4">Réinitialiser les filtres</button>
    </div>


    <div class="overflow-x-auto">
        <table class="min-w-full">

            <thead
                class="border-b border-t border-gray-200 bg-gray-100 text-xs leading-4 font-semibold uppercase tracking-wider text-left">
                <tr>
                    <th class="pl-3">
                        <span class="flex items-center justify-center">
                            <input type="checkbox" class="w-4 h-4 rounded" wire:click="$emit('toggleSelectAll')"> </span>
                    </th>

                    <th class="px-3 py-3">
                        Code Client
                    </th>
                    <th class="px-3 py-3">
                        Client
                    </th>
                    <th class="px-3 py-3">
                        Agence
                    </th>
                    <th class="px-3 py-3">
                        Pôle
                    </th>
                    <th class="px-3 py-3">
                        Garantie
                    </th>
                    <th class="px-3 py-3">
                        Types de demande
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($deeds as $deed)
                <livewire:deeds.table-row :key="$deed->id" :deed="$deed->id">
                @empty
                <tr class="border-b border-gray-200 text-sm">
                    <td class="px-3 py-2 text-center" colspan="7">Aucun élément</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4">
        {{ $deeds->links() }}
    </div>

    {{--    delete popup--}}
    @if($showConfirmDeletePopup)
    <div class="fixed z-10 inset-0 overflow-y-auto transition-opacity duration-150" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-200 opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full mx-auto">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Suppression d'acte
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Êtes-vous sûr de vouloir supprimer?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:gap-2 sm:flex-row-reverse">
                    <button wire:click="delete()" type="button" wire:loading.attr="disabled"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Supprimer
                        <span wire:loading wire:target="delete" class="flex items-center justify-center h-3 w-3">
                            <span class="animate-spin absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                        </span>
                    </button>
                    <button wire:click="closeDeletePopUp" type="button" wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{--    /delete popup--}}
</div>

