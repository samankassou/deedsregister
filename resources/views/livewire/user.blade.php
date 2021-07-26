<div>
    <div>
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden  sm:rounded-lg p-2 flex flex-row justify-end">
                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                wire:click="create">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Créer
                            </button>
                        </div>
                    </div>
                    <div class="py-4 px-3 pb-0 w-1/3">
                        <div class="md:flex items-center">
                            <div class="flex-1">
                                <div class="relative text-left mb-4">
                                    <label class="block">

                                    </label>
                                    <input
                                        class="appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-3 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:border-2 border"
                                        type="text" name="" placeholder="Rechercher..." autocomplete="off" wire:model="search">
                                    <div class="absolute right-0 top-0 mt-2 mr-4 text-purple-lighter">
                                        <a wire:click.prevent="clearSearch" href="#" class="text-gray-400 hover:text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search w-4">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Nom(s)
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Email
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Roles
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">

                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($rows as $row)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $row->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $row->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ optional($row->roles)->implode('display_name', ', ')}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @livewire('toggle-user-status', ['user' => $row->id])
                                </td>
                                <td
                                    class="flex items-center justify-end px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" title="Modifier" class="text-indigo-600 hover:text-indigo-900"
                                        wire:click="edit({{ $row->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="#" title="Supprimer" class="text-indigo-600 hover:text-indigo-900"
                                        wire:click="confirmDelete({{ $row->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-gray-500">Aucun élément</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $rows->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--    create / edit form --}}
    @if($showForm)
    <div class="fixed z-10 inset-0 overflow-y-scroll" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-200 opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full mx-auto">
                <div class="flex flex-row justify-start p-2 bg-gray-100">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{ $mode == 'create' ? 'bg-green-100' : 'bg-blue-100' }} sm:mx-0 sm:h-10 sm:w-10">
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 ml-4 p-2" id="modal-title">
                        {{ $mode == 'create' ? 'Créer un utilisateur' : 'Modifier ' }}
                    </h3>
                </div>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">

                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">

                            <div class="mt-2">
                                <div>
                                    <label class='block'><span class='text-gray-700 @error(' name') text-red-500
                                            @enderror'>Nom(s) de l'utilisateur</span>
                                        <input type='text'
                                            class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('
                                            name') border-red-500 @enderror focus:border-indigo-300 focus:ring
                                            focus:ring-indigo-200 focus:ring-opacity-50'
                                            wire:model='name'>@error('name')<span
                                            class='text-red-500 text-sm'>{{ $message }}</span>@enderror
                                    </label>
                                </div>

                                <div class="mt-2">
                                    <div>
                                        <label class='block'><span class='text-gray-700 @error(' email') text-red-500
                                                @enderror'>Email</span>
                                            <input type='text'
                                                class='mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('
                                                email') border-red-500 @enderror focus:border-indigo-300 focus:ring
                                                focus:ring-indigo-200 focus:ring-opacity-50'
                                                wire:model='email'>@error('email')<span
                                                class='text-red-500 text-sm'>{{ $message }}</span>@enderror
                                        </label>
                                    </div>

                                </div>

                                <div class="mt-2">
                                    <div wire:ignore>
                                        <label class='block'><span class='text-gray-700 @error(' roles.*') text-red-500 @enderror'>Roles</span>
                                            <select wire:model="roles" id="slim" class='slim mt-1 block w-full rounded-md border-gray-300 shadow-sm @error(' roles.*')
                                                border-red-500 @enderror focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' multiple>
                                                @foreach ($allRoles as $role)
                                                    <option value="{{ $role->id }}" {{ collect($roles)->contains($role->id) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    @error('roles.*')<span class='text-red-500 text-sm'>{{ $message }}</span>@enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-2 bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @if($mode=='create' ) wire:click="store()" @else wire:click="update()" @endif
                            type="button"
                            class="inline-flex justify-center px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{ $mode == 'create' ? 'Enregistrer' : 'Modifier' }}
                        </button>
                        <button wire:click="closeForm" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{--    /create /edit form--}}


        {{--    delete popup--}}
        @if($showConfirmDeletePopup)
        <div class="fixed z-10 inset-0 overflow-y-auto transition-opacity duration-150" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                    Supprimer Utilisateur
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Êtes-vous sûr de vouloir supprimer? Cette action est irréversible.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="destroy()" type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Supprimer
                        </button>
                        <button wire:click="$set('showConfirmDeletePopup', false)" type="button"
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
