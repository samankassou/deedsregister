<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use Livewire\Component;
use App\Exports\DeedExport;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;

class Table extends Component
{
    use WithPagination;


    public $search;
    public $primaryId;

    public $showConfirmDeletePopup = false;

    public $paginate = 10;

    protected $listeners = [
        'showDeletePopUp',
        'exportToExcel',
        'paginate'
    ];

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Deed::latest()->with(['agency', 'pole', 'warranty', 'typeOfRequests']);
    }

    public function filteredData()
    {
        return $this->repository()
            ->where('client', 'like', '%' . $this->search . '%')
            ->orWhere('client_code', 'like', '%' . $this->search . '%');
    }

    public function filteredDataWithPagination()
    {
        return $this->filteredData()->paginate($this->paginate);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.deeds.table', [
            'deeds' => $this->filteredDataWithPagination()
        ]);
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

    public function paginate($value)
    {
        $this->paginate = $value;
    }

    public function exportToExcel()
    {
        $data = $this->filteredData()->get();
        $fileName = 'liste_des_actes_' . today()->format('d-m-Y') . '.xlsx';
        return Excel::download(new DeedExport(collect($data)), $fileName);
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
