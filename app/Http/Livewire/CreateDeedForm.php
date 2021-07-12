<?php

namespace App\Http\Livewire;

use App\Models\Agency;
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
    public $client         = "";
    public $agency         = "";
    public $pole           = "";
    public $warranty       = "";
    public $typesOfRequest = [];
    public $dateOfReceiptOfTheRequest = null;

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
        session()->flash('alert', 'success');
        session()->flash('message', 'Post successfully updated.');
        return redirect()->route('admin.deeds.index');
        dd('ok');
    }

    public function render()
    {
        return view('livewire.create-deed-form');
    }
}
