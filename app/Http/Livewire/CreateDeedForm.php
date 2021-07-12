<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use App\Models\Deed;
use App\Models\Pole;
use App\Models\TypeOfRequest;
use App\Models\Warranty;
use Livewire\Component;

class CreateDeedForm extends Component
{
    //selects options
    public $poles;
    public $warranties;
    public $agencies;
    public $typesOfRequests;

    //user inputs
    public $client;
    public $agency;
    public $pole;
    public $warranty;
    public $typesOfRequest = [];
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

    //validation rules
    protected function rules()
    {
        return [
            'client'         => 'required',
            'agency'         => 'required',
            'pole'           => 'required',
            'warranty'       => 'required',
        ];
    }

    protected $validationAttributes = [
        'client'   => 'Client',
        'agency'   => 'Agence',
        'pole'     => 'Pôle',
        'warranty' => 'Garantie',
    ];

    public function mount()
    {
        $this->poles           = Pole::all();
        $this->typesOfRequests = TypeOfRequest::all();
        $this->warranties      = Warranty::all();
        $this->agencies        = Agency::all();
    }

    public function store()
    {
        $this->validate();
        $data = [
            'client'                         => $this->client,
            'agency_id'                      => $this->agency,
            'pole_id'                        => $this->pole,
            'warranty_id'                    => $this->warranty,
            'notary'                         => $this->notary,
            'correspondent_of_the_notary'    => $this->correspondentOfTheNotary,
            'purpose_of_the_credit'          => $this->purposeOfTheCredit,
            'reference_of_credit_decision'   => $this->referenceOfCreditDecision,
            'date_of_receipt_of_the_request' => $this->dateOfReceiptOfTheRequest,
            'tax_notice_reference'           => $this->taxNoticeReference,
            'debit_advice_notified'          => $this->debitAdviceNotified,
            'writting_end_date'              => $this->writtingEndDate,
            'signature_date'                 => $this->signatureDate,
            'writting_completion_date'       => $this->writtingCompletionDate,
            'writting_amount'                => $this->writtingAmount,
            'registration_sending_date'      => $this->registrationSendingDate,
            'registration_return_date'       => $this->registrationReturnDate,
            'registration_amount'            => $this->inscriptionAmount,
            'file_completion_date'           => $this->fileCompletionDate,
            'filing_date'                    => $this->filingDate,
            'file_withdrawal_date'           => $this->fileWithdrawalDate,
            'date_of_transmission_to_the_BO' => $this->dateOfTransmissionToTheBO
        ];
        $deed = Deed::create($data);
        if (!empty($this->typesOfRequest)) {
            $deed->typeOfRequests()->attach($this->typesOfRequest);
        }
        session()->flash('alert', 'success');
        session()->flash('message', 'Post successfully updated.');
        return redirect()->route('admin.deeds.index');
    }

    public function render()
    {
        return view('livewire.create-deed-form');
    }
}
