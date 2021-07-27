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
    public $typesOfRequest = [];
    public $deed;

    //user inputs
    public $transmissionSlip = [];

    // validation rules
    protected function rules()
    {
        return [
            'deed.client'                         => 'required',
            'deed.client_code'                    => 'required',
            'deed.notary'                         => 'nullable|string',
            'deed.correspondent_of_the_notary'    => 'nullable|string',
            'deed.purpose_of_the_credit'          => 'required',
            'deed.reference_of_credit_decision'   => 'required',
            'deed.date_of_receipt_of_the_request' => 'nullable|date',
            'deed.tax_notice_reference'           => 'nullable',
            'deed.debit_advice_notified'          => 'nullable',
            'deed.writting_end_date'              => 'nullable|date',
            'deed.signature_date'                 => 'nullable|date',
            'deed.writting_completion_date'       => 'nullable|date',
            'deed.registration_sending_date'      => 'nullable|date',
            'deed.registration_return_date'       => 'nullable|date',
            'deed.registration_amount'            => 'nullable|integer',
            'deed.file_completion_date'           => 'nullable|date',
            'deed.filing_date'                    => 'nullable|date',
            'deed.file_withdrawal_date'           => 'nullable|date',
            'deed.date_of_transmission_to_the_BO' => 'nullable|date',
            'deed.inscription_amount'             => 'nullable|integer',
            'transmissionSlip.*'                  => 'nullable|file|mimes:pdf,doc,docx',
            'deed.agency_id'                      => 'required',
            'deed.pole_id'                        => 'required',
            'deed.warranty_id'                    => 'required',
            'deed.documentation'                  => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'deed.client'                         => 'Client',
        'deed.client_code'                    => 'Code Client',
        'deed.notary'                         => 'Notaire',
        'deed.correspondent_of_the_notary'    => 'Correspondant notaire',
        'deed.purpose_of_the_credit'          => 'Objet du crédit',
        'deed.reference_of_credit_decision'   => 'Référence de la décision',
        'deed.date_of_receipt_of_the_request' => 'Date réception demande',
        'deed.tax_notice_reference'           => 'Référence avis d\'imposition',
        'deed.debit_advice_notified'          => 'Avis de débit notifié au client?',
        'deed.writting_end_date'              => 'Date fin rédaction',
        'deed.signature_date'                 => 'Date de signature',
        'deed.writting_completion_date'       => 'Date de complétude',
        'deed.registration_sending_date'      => 'Date d\'envoi',
        'deed.registration_return_date'       => 'Date retour',
        'deed.registration_amount'            => 'Montant',
        'deed.file_completion_date'           => 'Date complétude dossier',
        'deed.filing_date'                    => 'Date dépôt dossier',
        'deed.file_withdrawal_date'           => 'Date de retrait',
        'deed.date_of_transmission_to_the_BO' => 'Date de transmission au BO Garantie',
        'deed.inscription_amount'             => 'Montant de l\'inscription',
        'deed.agency_id'                      => 'Agence',
        'deed.pole_id'                        => 'Pôle',
        'deed.warranty_id'                    => 'Garantie',
        'deed.documentation'                  => 'Documentation',
    ];

    protected $messages = [
        'transmissionSlip.*.file' => 'Vous ne pouvez uploader que des fichiers de type: pdf, doc ou docx',
        'transmissionSlip.*.mimes' => 'Vous ne pouvez uploader que des fichiers de type: pdf, doc ou docx',
    ];

    public function mount()
    {
        $this->poles           = Pole::all();
        $this->typesOfRequests = TypeOfRequest::all();
        $this->warranties      = Warranty::all();
        $this->agencies        = Agency::all();
        $this->deed            = new Deed();
    }

    public function save()
    {
        $this->validate();

        $this->deed->created_by = auth()->user()->id;
        $this->deed->updated_by = auth()->user()->id;
        $this->deed->save();
        foreach ($this->transmissionSlip as $file) {
            $this->deed->addMedia($file->getRealPath())
                ->usingName($file->getClientOriginalName())
                ->toMediaCollection();
        }

        $this->deed->typeOfRequests()->attach($this->typesOfRequest);

        session()->flash('alert', 'success');
        session()->flash('message', 'Acte ajouté avec succès.');
        return redirect()->route('admin.deeds.show', $this->deed);
    }

    public function render()
    {
        if (count($this->getErrorBag()->all())) {
            $this->dispatchBrowserEvent('alert-emit', [
                'alert' => 'error',
                'message' => 'Veuillez vérifier les informations saisies'
            ]);
        }
        return view('livewire.create-deed-form');
    }
}
