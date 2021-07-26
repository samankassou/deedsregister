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
                        <input type="text" wire:model.defer="deed.client" id="client"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error("deed.client") is-invalid @enderror">
                        @error('deed.client') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="clientCode" class="block text-sm font-medium text-gray-700">Code Client<sup
                                class="text-red-500">*</sup></label>
                        <input type="text" wire:model.defer="deed.client_code" id="clientCode"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('deed.client_code') is-invalid @enderror">
                        @error('deed.client_code') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="agencyId" class="block text-sm font-medium text-gray-700">Agence<sup
                                class="text-red-500">*</sup></label>
                        <select id="agencyId" wire:model.defer="deed.agency_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" class="text-gray-300">Sélectionnez une agence</option>
                            @foreach ($agencies as $agency)
                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                            @endforeach
                        </select>
                        @error('deed.agency_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="poleId" class="block text-sm font-medium text-gray-700">Pôle<sup
                                class="text-red-500">*</sup></label>
                        <select id="poleId" wire:model.defer="deed.pole_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" class="text-gray-300">Sélectionnez un pôle</option>
                            @foreach ($poles as $pole)
                            <option value="{{ $pole->id }}">{{ $pole->name }}</option>
                            @endforeach
                        </select>
                        @error('deed.pole_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="warrantyId" class="block text-sm font-medium text-gray-700">Type de garantie<sup
                                class="text-red-500">*</sup></label>
                        <select id="warrantyId" wire:model.defer="deed.warranty_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" class="text-gray-300">Sélectionner une garantie</option>
                            @foreach ($warranties as $warranty)
                            <option value="{{ $warranty->id }}">{{ $warranty->name }}</option>
                            @endforeach
                        </select>
                        @error('deed.warranty_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="referenceOfCreditDecision" class="block text-sm font-medium text-gray-700">Référence
                            décision de crédit<sup class="text-red-500">*</sup></label>
                        <input type="text" id="referenceOfCreditDecision"
                            wire:model.defer="deed.reference_of_credit_decision"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="purposeOfTheCredit" class="block text-sm font-medium text-gray-700">Objet du
                            crédit<sup class="text-red-500">*</sup></label>
                        <input type="text" wire:model.defer="deed.purpose_of_the_credit" id="purposeOfTheCredit"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('deed.purpose_of_the_credit') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="notary" class="block text-sm font-medium text-gray-700">Notaire</label>
                        <input type="text" wire:model.defer="deed.notary" id="notary"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('deed.notary') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="correspondentOfTheNotary"
                            class="block text-sm font-medium text-gray-700">Correspondant du notaire</label>
                        <input type="text" wire:model.defer="deed.correspondent_of_the_notary"
                            id="correspondentOfTheNotary"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('deed.correspondent_of_the_notary') <span
                            class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="dateOfReceiptOfTheRequest" class="block text-sm font-medium text-gray-700">Date
                            réception demande</label>
                        <input type="date" wire:model.defer="deed.date_of_receipt_of_the_request"
                            id="dateOfReceiptOfTheRequest"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                        @error('deed.date_of_receipt_of_the_request') <span
                            class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="typesOfRequest" class="block text-sm font-medium text-gray-700">Type de demande<sup
                                class="text-red-500">*</sup></label>
                        <div wire:ignore>
                            <x-choice-select wire:model="typesOfRequest" :options="$typesOfRequests" />
                        </div>
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
                                                <input type="date" wire:model.defer="deed.writting_completion_date"
                                                    id="writtingCompletionDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('deed.writting_completion_date') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="writtingEndDate"
                                                    class="block text-sm font-medium text-gray-700">Date fin
                                                    rédaction</label>
                                                <input type="date" wire:model.defer="deed.writting_end_date"
                                                    id="writtingEndDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('deed.writting_end_date') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="signatureDate"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    signature</label>
                                                <input type="date" wire:model.defer="deed.signature_date"
                                                    id="signatureDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('deed.signature_date') <span
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
                                                <input type="date" wire:model.defer="deed.registration_sending_date"
                                                    id="registrationSendingDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('deed.registration_sending_date') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="registrationReturnDate"
                                                    class="block text-sm font-medium text-gray-700">Date retour</label>
                                                <input type="date" wire:model.defer="deed.registration_return_date"
                                                    id="registrationReturnDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('deed.registration_return_date') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="writtingAmount"
                                                    class="block text-sm font-medium text-gray-700">Montant</label>
                                                <input type="text" wire:model.defer="deed.registration_amount"
                                                    id="registrationAmount"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('deed.registration_amount') <span
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
                                                <input type="date" wire:model.defer="deed.file_completion_date"
                                                    id="fileCompletionDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('fileCompletionDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="filingDate"
                                                    class="block text-sm font-medium text-gray-700">Date dépôt
                                                    dossier</label>
                                                <input type="date" wire:model.defer="deed.filing_date" id="filingDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('filingDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fileWithdrawalDate"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    retrait</label>
                                                <input type="date" wire:model.defer="deed.file_withdrawal_date"
                                                    id="fileWithdrawalDate"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('fileWithdrawalDate') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="dateOfTransmissionToTheBO"
                                                    class="block text-sm font-medium text-gray-700">Date de
                                                    transmission au BO Garantie</label>
                                                <input type="date"
                                                    wire:model.defer="deed.date_of_transmission_to_the_BO"
                                                    id="dateOfTransmissionToTheBO"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @error('dateOfTransmissionToTheBO') <span
                                                    class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="inscriptionAmount"
                                                    class="block text-sm font-medium text-gray-700">Montant de
                                                    l'inscription</label>
                                                <input type="number" wire:model.defer="deed.inscription_amount"
                                                    id="inscriptionAmount"
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
                        <input type="text" wire:model.defer="deed.tax_notice_reference" id="taxNoticeReference"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('taxNoticeReference') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="debitAdviceNotified" class="block text-sm font-medium text-gray-700">Avis de débit
                            notifié au
                            client?</label>
                        <select wire:model.defer="deed.debit_advice_notified" id="debitAdviceNotified"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value=""></option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                        @error('debitAdviceNotified') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="documentation" class="block text-sm font-medium text-gray-700">Documentation
                            physique</label>
                        <textarea wire:model.defer="deed.documentation" id="documentation" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('debitAdviceNotified') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="documentation" class="block text-sm font-medium text-gray-700">Bordereau de
                            transmission validé par le
                            BO Garanties</label>
                        <div class="bg-white>
                                                <div class=" max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full">
                                    <div
                                        class="relative border-dotted h-28 rounded-lg border border-blue-700 bg-gray-50 flex justify-center items-center">
                                        <div class="absolute">
                                            <div class="flex flex-col items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                </svg>
                                                {{ count($transmissionSlip) ? count($transmissionSlip)."fichier(s) sélectionné(s)" : "Aucun fichier sélectionné" }}
                                            </div>
                                        </div>
                                        <input wire:model.defer="transmissionSlip" type="file"
                                            class="h-full w-full cursor-pointer opacity-0" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('transmissionSlip.*') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" wire:target="save" wire:loading.attr="disabled" wire:click.prevent="save"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer
            </button>
        </div>
</div>
</form>
</div>
