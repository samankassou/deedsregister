<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Agency;
use App\Models\Deed;
use App\Models\Pole;
use App\Models\TypeOfRequest;
use App\Models\Warranty;
use Livewire\Component;

class EditDeedForm extends Component
{
    public $deed;

    protected $rules = [
        'client'      => 'required',
        'clientCode' => 'required',
        'agencyId'   => 'required|exists:agencies,id',
        'poleId'     => 'required|exists:poles,id',
        'warrantyId' => 'required|exists:warranties,id',
    ];

    //selects options
    public $poles;
    public $warranties;
    public $agencies;
    public $typesOfRequests;
    public $typesOfRequest;

    //user inputs
    public $client;
    public $clientCode;
    public $poleId;
    public $warrantyId;
    public $agencyId;
    public $dateOfReceiptOfTheRequest;
    public $notary;
    public $correspondentOfTheNotary;
    public $purposeOfTheCredit;
    public $referenceOfCreditDecision;
    public $taxNoticeReference;
    public $debitAdviceNotified;
    public $writtingEndDate;
    public $signatureDate;
    public $writtingCompletionDate;
    public $registrationSendingDate;
    public $registrationReturnDate;
    public $registrationAmount;
    public $fileCompletionDate;
    public $filingDate;
    public $fileWithdrawalDate;
    public $dateOfTransmissionToTheBO;
    public $inscriptionAmount;
    public $documentation;

    public function mount(Deed $deed)
    {
        $this->poles           = Pole::all();
        $this->typesOfRequests = TypeOfRequest::all();
        $this->warranties      = Warranty::all();
        $this->agencies        = Agency::all();
        $this->deed            = $deed;

        $this->client                    = $deed->client;
        $this->clientCode                = $deed->client_code;
        $this->poleId                    = $deed->pole_id;
        $this->agencyId                  = $deed->agency_id;
        $this->warrantyId                = $deed->warranty_id;
        $this->referenceOfCreditDecision = $deed->reference_of_credit_decision;
        $this->purposeOfTheCredit        = $deed->purpose_of_the_credit;
        $this->notary                    = $deed->notary;
        $this->correspondentOfTheNotary  = $deed->correspondent_of_the_notary;
        $this->dateOfReceiptOfTheRequest = optional($deed->date_of_receipt_of_the_request)->format('d/m/Y');
        $this->writtingCompletionDate    = optional($deed->writting_completion_date)->format('d/m/Y');
        $this->writtingEndDate           = optional($deed->writting_end_date)->format('d/m/Y');
        $this->signatureDate             = optional($deed->signature_date)->format('d/m/Y');
        $this->registrationSendingDate   = optional($deed->registration_sending_date)->format('d/m/Y');
        $this->registrationReturnDate    = optional($deed->registration_return_date)->format('d/m/Y');
        $this->registrationAmount        = $deed->registration_amount;
        $this->taxNoticeReference        = $deed->tax_notice_reference;
        $this->debitAdviceNotified       = $deed->debit_advice_notified;
        $this->documentation             = $deed->documentation;
        $this->fileCompletionDate        = optional($deed->file_completion_date)->format('d/m/Y');
        $this->filingDate                = optional($deed->filing_date)->format('d/m/Y');
        $this->fileWithdrawalDate        = optional($deed->file_withdrawal_date)->format('d/m/Y');
        $this->dateOfTransmissionToTheBO = optional($deed->date_of_transmission_to_the_BO)->format('d/m/Y');
        $this->inscriptionAmount         = $deed->inscription_amount;
        $this->typesOfRequest            = $deed->typeOfRequests->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();
        //dd($this->deed);
        $data = [
            'client'                         => $this->client,
            'client_code'                    => $this->clientCode,
            'agency_id'                      => $this->agencyId,
            'pole_id'                        => $this->poleId,
            'warranty_id'                    => $this->warrantyId,
            'notary'                         => $this->notary,
            'correspondent_of_the_notary'    => $this->correspondentOfTheNotary,
            'purpose_of_the_credit'          => $this->purposeOfTheCredit,
            'reference_of_credit_decision'   => $this->referenceOfCreditDecision,
            //'date_of_receipt_of_the_request' => $this->dateOfReceiptOfTheRequest,
            'tax_notice_reference'           => $this->taxNoticeReference,
            'debit_advice_notified'          => $this->debitAdviceNotified,
            //'writting_end_date'              => $this->writtingEndDate,
            //'signature_date'                 => $this->signatureDate,
            //'writting_completion_date'       => $this->writtingCompletionDate,
            //'registration_sending_date'      => $this->registrationSendingDate,
            //'registration_return_date'       => $this->registrationReturnDate,
            'registration_amount'            => $this->inscriptionAmount,
            //'file_completion_date'           => $this->fileCompletionDate,
            //'filing_date'                    => $this->filingDate,
            //'file_withdrawal_date'           => $this->fileWithdrawalDate,
            //'date_of_transmission_to_the_BO' => $this->dateOfTransmissionToTheBO,
            'inscription_amount'             => $this->inscriptionAmount,
            'documentation'                  => $this->documentation
        ];
        $this->deed->update($data);
        $this->deed->typeOfRequests()->sync($this->typesOfRequest);

        session()->flash('alert', 'success');
        session()->flash('message', 'Modifications enregistrées avec succès.');
        return redirect()->route('admin.deeds.show', $this->deed);
    }

    public function render()
    {
        return view('livewire.edit-deed-form');
    }
}
