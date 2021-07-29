<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use Livewire\Component;

class TableRow extends Component
{
    public $deed;

    public function mount(Deed $deed)
    {
        $this->deed = $deed;
    }
    public function render()
    {
        return view('livewire.deeds.table-row');
    }
}
