<div class="mt-5 md:mt-0">
    <form action="#" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <p class="font-thin text-sm italic">Les champs marqués d'un <span
                                class="text-red-500 font-bold">*</span> sont obligatoires</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="client" class="block text-sm font-medium text-gray-700">Client<sup
                                class="text-red-500">*</sup></label>
                        <input type="text" wire:model="client" id="client"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('client') is-invalid @enderror">
                        @error('client') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="clientCode" class="block text-sm font-medium text-gray-700">Code Client<sup
                                class="text-red-500">*</sup></label>
                        <input type="text" wire:model="clientCode" id="clientCode"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('clientCode') is-invalid @enderror">
                        @error('clientCode') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="agency" class="block text-sm font-medium text-gray-700">Agence<sup
                                class="text-red-500">*</sup></label>
                        <select id="agency" wire:model="agency"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($agencies as $agency)
                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                            @endforeach
                        </select>
                        @error('agency') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="pole" class="block text-sm font-medium text-gray-700">Pôle<sup
                                class="text-red-500">*</sup></label>
                        <select id="pole" wire:model="pole"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" class="text-gray-300">Sélectionnez un pôle</option>
                            @foreach ($poles as $pole)
                            <option value="{{ $pole->id }}">{{ $pole->name }}</option>
                            @endforeach
                        </select>
                        @error('pole') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="warranty" class="block text-sm font-medium text-gray-700">Type de garantie<sup
                                class="text-red-500">*</sup></label>
                        <select id="warranty" wire:model="warranty"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" class="text-gray-300">Sélectionner une garantie</option>
                            @foreach ($warranties as $warranty)
                            <option value="{{ $warranty->id }}">{{ $warranty->name }}</option>
                            @endforeach
                        </select>
                        @error('warranty') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="referenceOfCreditDecision" class="block text-sm font-medium text-gray-700">Référence
                            décision de crédit<sup class="text-red-500">*</sup></label>
                        <input type="text" id="referenceOfCreditDecision" wire:model="referenceOfCreditDecision"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="purposeOfTheCredit" class="block text-sm font-medium text-gray-700">Objet du
                            crédit<sup class="text-red-500">*</sup></label>
                        <input type="text" wire:model="purposeOfTheCredit" id="purposeOfTheCredit"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('purposeOfTheCredit') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="notary" class="block text-sm font-medium text-gray-700">Notaire</label>
                        <input type="text" wire:model="notary" id="notary"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('notary') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="correspondentOfTheNotary"
                            class="block text-sm font-medium text-gray-700">Correspondant du notaire</label>
                        <input type="text" wire:model="correspondentOfTheNotary" id="correspondentOfTheNotary"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('correspondentOfTheNotary') <span
                            class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="dateOfReceiptOfTheRequest" class="block text-sm font-medium text-gray-700">Date
                            réception demande</label>
                        <x-date-picker wire:model="dateOfReceiptOfTheRequest" id="dateOfReceiptOfTheRequest"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        @error('dateOfReceiptOfTheRequest') <span
                            class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="typesOfRequest" class="block text-sm font-medium text-gray-700">Type de demande<sup
                                class="text-red-500">*</sup></label>
                        <x-choice-select wire:model="selectedTypesOfRequest" :options="$typesOfRequests" :initials="$typesOfRequest" />
                        @error('typesOfRequest') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (collect($typesOfRequest)->contains($typesOfRequests->firstWhere('name', 'Rédaction')->id))
                    <div class="col-span-6">
                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Rédaction</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Saississez les informations par rapport à la rédaction
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="writtingCompletionDate"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    complétude</label>
                                                <x-date-picker wire:model="writtingCompletionDate"
                                                    id="writtingCompletionDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('writtingCompletionDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="writtingEndDate"
                                                    class="block text-sm font-medium text-gray-700">Date fin
                                                    rédaction</label>
                                                <x-date-picker wire:model="writtingEndDate" id="writtingEndDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('writtingEndDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="signatureDate"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    signature</label>
                                                <x-date-picker wire:model="signatureDate" id="signatureDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('signatureDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (collect($typesOfRequest)->contains($typesOfRequests->firstWhere('name', 'Enregistrement')->id))
                    <div class="col-span-6">
                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Enregistrement</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Saississez les informations par rapport à l'enregistrement
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="registrationSendingDate"
                                                    class="block text-sm font-medium text-gray-700">Date d'envoi</label>
                                                <x-date-picker wire:model="registrationSendingDate"
                                                    id="registrationSendingDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('registrationSendingDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="registrationReturnDate"
                                                    class="block text-sm font-medium text-gray-700">Date retour</label>
                                                <x-date-picker wire:model="registrationReturnDate"
                                                    id="registrationReturnDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('registrationReturnDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="writtingAmount"
                                                    class="block text-sm font-medium text-gray-700">Montant</label>
                                                <input type="text" wire:model="writtingAmount" id="writtingAmount"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('writtingAmount') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (collect($typesOfRequest)->contains($typesOfRequests->firstWhere('name', 'Inscription')->id))
                    <div class="col-span-6">
                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Inscription</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Saississez les informations par rapport à l'inscription
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fileCompletionDate"
                                                    class="block text-sm font-medium text-gray-700">Date complétude
                                                    dossier</label>
                                                <x-date-picker wire:model="fileCompletionDate" id="fileCompletionDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('fileCompletionDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="filingDate"
                                                    class="block text-sm font-medium text-gray-700">Date dépôt
                                                    dossier</label>
                                                <x-date-picker wire:model="filingDate" id="filingDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('filingDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fileWithdrawalDate"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    retrait</label>
                                                <x-date-picker wire:model="fileWithdrawalDate" id="fileWithdrawalDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('fileWithdrawalDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="dateOfTransmissionToTheBO"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    transmission au BO Garantie</label>
                                                <x-date-picker wire:model="dateOfTransmissionToTheBO"
                                                    id="dateOfTransmissionToTheBO"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('dateOfTransmissionToTheBO') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="inscriptionAmount"
                                                    class="block text-sm font-medium text-gray-700">Montant de
                                                    l'inscription</label>
                                                <input type="number" name="inscriptionAmount" id="inscriptionAmount"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('inscriptionAmount') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-span-6 sm:col-span-3">
                        <label for="taxNoticeReference" class="block text-sm font-medium text-gray-700">Référence avis
                            d'imposition</label>
                        <input type="text" wire:model="taxNoticeReference" id="taxNoticeReference"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('taxNoticeReference') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="debitAdviceNotified" class="block text-sm font-medium text-gray-700">Avis de débit
                            notifié au
                            client?</label>
                        <select wire:model="debitAdviceNotified" id="debitAdviceNotified"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value=""></option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                        </select>
                        @error('debitAdviceNotified') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="documentation" class="block text-sm font-medium text-gray-700">Documentation
                            physique</label>
                        <textarea wire:model="documentation" id="documentation" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('debitAdviceNotified') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" wire:click.prevent="store"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
</div>
