<?php

namespace App\Http\Livewire;

use App\Models\Deed;
use Livewire\Component;

class TotalDeedCount extends Component
{
    public $deedsCount;

    public function getListeners()
    {
        return [
            'deedAdded' => 'refresh',
            'deedUpdated' => 'refresh',
            'deedDeleted' => 'refresh',
            'deedRestored' => 'refresh',
        ];
    }

    public function mount()
    {
        $this->deedsCount = Deed::count();
    }
    public function render()
    {
        return view('livewire.total-deed-count');
    }

    public function refresh()
    {
        $this->deedsCount = Deed::count();
    }
}
