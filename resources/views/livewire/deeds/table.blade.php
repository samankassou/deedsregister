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

                <div>
                    <div class="flex space-x-1">

                    </div>
                </div>

                <div>
                </div>
            </div>
        </div>
    </div>


    <div class="overflow-x-auto">
        <table class="min-w-full">

            <thead
                class="border-b border-t border-gray-200 bg-gray-100 text-xs leading-4 font-semibold uppercase tracking-wider text-left">
                <tr>
                    <th class="pl-3">
                        <span class="flex items-center justify-center">
                            <input type="checkbox" class="w-4 h-4 rounded" wire:model="allSelected"> </span>
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
                                Supprimer un acte
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Êtes-vous sûr de vouloir supprimer?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="deleteDeed()" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Supprimer
                    </button>
                    <button wire:click="closeDeletePopUp" type="button"
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

