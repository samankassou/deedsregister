<div class="p-3">
    <div class="col-span-6">
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Paramètres</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Cette page vous permet de modifier vos paramètres de connexion
                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nom(s)</label>
                                <input type="text" wire:model.defer="name"
                                    id="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                @error('name') <span
                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" wire:model.defer="email" id="email"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                @error('email') <span
                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 text-right">
                                <button type="button" class="bg-indigo-500 focus:outline-none hover:bg-indigo-800 p-2 text-white text-sm rounded-md" wire:click="saveInfos">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:grid md:grid-cols-3 md:gap-6"></div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="oldPassword" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                                <input type="password" wire:model.defer="oldPassword" id="oldPassword"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                @error('oldPassword') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                                <input type="password" wire:model.defer="password" id="password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="passwordConf" class="block text-sm font-medium text-gray-700">Confirmation</label>
                                <input type="password" wire:model.defer="password_confirmation" id="passwordConf"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                @error('password_confirmation') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-6 text-right">
                                <button type="button"
                                    class="bg-indigo-500 focus:outline-none hover:bg-indigo-800 p-2 text-white text-sm rounded-md"
                                    wire:click="changePassword">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
