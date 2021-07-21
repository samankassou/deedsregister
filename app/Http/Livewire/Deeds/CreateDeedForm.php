<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Agency;
use App\Models\Deed;
use App\Models\Pole;
use App\Models\TypeOfRequest;
use App\Models\Warranty;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDeedForm extends Component
{
    use WithFileUploads;
    //selects options
    public $poles;
    public $warranties;
    public $agencies;
    public $typesOfRequests;

    //user inputs
    public $client;
    public $clientCode;
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
    public $documentation;
    public $transmissionSlip = [];

    //validation rules
    protected function rules()
    {
        return [
            'client'                    => 'required',
            'clientCode'                => 'nullable',
            'agency'                    => 'required',
            'pole'                      => 'required',
            'warranty'                  => 'required',
            'referenceOfCreditDecision' => 'required',
            'purposeOfTheCredit'        => 'required',
            'writtingAmount'            => 'nullable|integer',
            'inscriptionAmount'         => 'nullable|integer',
            'dateOfReceiptOfTheRequest' => 'nullable|date',
            'writtingCompletionDate'    => 'nullable|date',
            'writtingEndDate'           => 'nullable|date',
            'signatureDate'             => 'nullable|date',
            'registrationSendingDate'   => 'nullable|date',
            'registrationReturnDate'    => 'nullable|date',
            'fileCompletionDate'        => 'nullable|date',
            'filingDate'                => 'nullable|date',
            'fileWithdrawalDate'        => 'nullable|date',
            'dateOfTransmissionToTheBO' => 'nullable|date',
            'dateOfTransmissionToTheBO' => 'nullable|date',
            'transmissionSlip.*'        => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }

    protected $validationAttributes = [
        'client'                    => 'Client',
        'clientCode'                => 'Client',
        'agency'                    => 'Agence',
        'pole'                      => 'Pôle',
        'warranty'                  => 'Garantie',
        'referenceOfCreditDecision' => 'Référence décision',
        'purposeOfTheCredit'        => 'Objet du crédit',
        'transmissionSlip.*'        => 'Bordereau de transmission',
    ];

    protected $messages = [
        'transmissionSlip.*.file' => 'Le champ :attribute ne peut contenir que des fichiers de type: pdf, doc ou docx',
        'transmissionSlip.*.mimes' => 'Le champ :attribute ne peut contenir que des fichiers de type: pdf, doc ou docx',
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
        //dd($this->transmissionSlip);
        $data = [
            'client'                         => $this->client,
            'client_code'                    => $this->clientCode,
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
            'date_of_transmission_to_the_BO' => $this->dateOfTransmissionToTheBO,
            'documentation'                  => $this->documentation
        ];
        $deed = Deed::create($data);
        foreach ($this->transmissionSlip as $file) {
            $deed->addMedia($file->getRealPath())
                ->usingName($file->getClientOriginalName())
                ->toMediaCollection('deeds', 'public');
        }

        $deed->typeOfRequests()->attach($this->typesOfRequest);

        session()->flash('alert', 'success');
        session()->flash('message', 'Acte ajouté avec succès.');
        return redirect()->route('admin.deeds.show', $deed);
    }

    public function render()
    {
        return view('livewire.create-deed-form');
    }
}
