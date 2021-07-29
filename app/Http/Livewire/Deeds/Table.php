<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;


    public $search;
    public $primaryId;

    public $showConfirmDeletePopup = false;

    public $paginate = 10;

    protected $listeners = ['showDeletePopUp'];

    public function mount()
    {
        //$this->deeds = Deed::paginate($this->paginate);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $deeds = Deed::where('client', 'like', '%' . $this->search . '%')
            ->orWhere('client_code', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.deeds.table', compact('deeds'));
    }

    public function showDeletePopUp($id)
    {
        $this->primaryId = $id;
        $this->showConfirmDeletePopup = true;
    }

    public function closeDeletePopUp()
    {
        $this->primaryId = null;
        $this->showConfirmDeletePopup = false;
    }

    public function deleteDeed()
    {
        Deed::find($this->primaryId)->delete();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Acte supprimé avec succès'
        ]);
        $this->closeDeletePopUp();
    }
}
