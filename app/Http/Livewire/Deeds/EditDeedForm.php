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
    //selects options
    public $poles;
    public $warranties;
    public $agencies;
    public $typesOfRequests;
    public $typesOfRequest;

    //user inputs
    public $client;
    public $clientCode;
    public $agency;
    public $pole;
    public $warranty;
    public $selectedTypesOfRequest = [];
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
    public $writtingAmount;
    public $registrationSendingDate;
    public $registrationReturnDate;
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

        $this->client = $deed->client;
        $this->clientCode = $deed->client_code;
        $this->agency = $deed->agency_id;
        $this->pole = $deed->pole_id;
        $this->warranty = $deed->warranty_id;
        $this->referenceOfCreditDecision = $deed->reference_of_credit_decision;
        $this->purposeOfTheCredit = $deed->purpose_of_the_credit;
        $this->notary = $deed->notary;
        $this->correspondentOfTheNotary = $deed->correspondent_of_the_notary;
        $this->dateOfReceiptOfTheRequest = optional($deed->date_of_receipt_of_the_request)->format('d/m/Y');
        $this->writtingCompletionDate = optional($deed->writting_completion_date)->format('d/m/Y');
        $this->writtingEndDate = optional($deed->writting_end_date)->format('d/m/Y');
        $this->signatureDate = optional($deed->signature_date)->format('d/m/Y');
        //$this->typesOfRequest = $deed->typeOfRequests;
        $this->typesOfRequest = $deed->typeOfRequests->pluck('id');
        //dd($deed->typeOfRequests->pluck('id')->toArray());
    }

    public function render()
    {
        return view('livewire.edit-deed-form');
    }
}
