<?php

namespace App\Http\Livewire\Deeds;

use App\Models\TypeOfRequest;
use Livewire\Component;

class TypeOfRequestFilter extends Component
{
    public $typesOfRequests;

    public function mount()
    {
        $this->typesOfRequests = TypeOfRequest::all();
    }
    public function render()
    {
        return view('livewire.deeds.type-of-request-filter');
    }

    public function addFilter()
    {
        $this->emitUp('filterSelected', 'TypeOfRequest', [1, 2]);
    }
}
