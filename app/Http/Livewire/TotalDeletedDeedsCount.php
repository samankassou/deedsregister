<?php

namespace App\Http\Livewire;

use App\Models\Deed;
use Livewire\Component;

class TotalDeletedDeedsCount extends Component
{
    public $deletedDeedsCount;

    public function getListeners()
    {
        return [
            'deedAdded' => 'refresh',
            'deedUpdated' => 'refresh',
            'deedDeleted' => 'refresh',
            'deedForceDeleted' => 'refresh',
            'deedRestored' => 'refresh',
        ];
    }

    public function mount()
    {
        $this->deletedDeedsCount = Deed::onlyTrashed()->count();
    }
    public function render()
    {
        return view('livewire.total-deleted-deeds-count');
    }

    public function refresh()
    {
        $this->deletedDeedsCount = Deed::onlyTrashed()->count();
    }
}
