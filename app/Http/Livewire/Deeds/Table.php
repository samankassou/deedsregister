<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use Livewire\Component;

class Table extends Component
{
    public $deeds;

    public $search;

    public function mount()
    {
        $this->deeds = Deed::all();
    }
    public function render()
    {
        return view('livewire.deeds.table');
    }
}
