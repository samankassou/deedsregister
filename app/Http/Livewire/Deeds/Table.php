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
    public $filters = [];
    public $selected = [];

    public $showConfirmDeletePopup = false;

    public $paginate = 10;

    protected $listeners = [
        'showDeletePopUp',
        'exportToExcel',
        'toggleSelected',
        'toggleSelectAll',
        'paginate',
        'filterSelected' => 'addFilter',
    ];

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Deed::latest();
    }

    public function filteredData()
    {
        $search = '%' . $this->search . '%';
        $query = $this->repository()
            ->where('client', 'LIKE', $search)
            ->orWhere('client_code', 'LIKE', $search)
            ->orWhere('notary', 'LIKE', $search);
        if (count($this->filters)) {
            $query->whereHas('TypeOfRequests', function ($query) {
                $query->whereIn('type_of_requests.id', $this->filters['TypeOfRequest']);
            });
        }

        return $query;
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

    public function showDeletePopUp($id = null)
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

    public function delete()
    {
        if (count($this->selected)) {
            $this->massDelete();
        } else {
            $this->deleteDeed();
        }
    }

    public function toggleSelectAll()
    {
        if (count($this->selected)) {
            $this->reset(['selected']);
        } else {
            $this->selected = Deed::pluck('id')->toArray();
        }
    }

    public function deleteDeed()
    {
        $deed = Deed::find($this->primaryId);
        $deed->update(['deleted_by' => auth()->user()->id]);
        $deed->delete();
        $this->emit('deedDeleted');
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Acte supprimé avec succès'
        ]);
        $this->closeDeletePopUp();
    }

    public function toggleSelected($id)
    {
        if (($key = array_search($id, $this->selected)) !== false) {
            unset($this->selected[$key]);
        } else {
            array_push($this->selected, $id);
        }
    }

    public function massDelete()
    {
        //dd($this->selected);
        $deeds = Deed::whereIn('id', $this->selected)->get();
        $deeds->each(function ($deed) {
            $deed->update(['deleted_by' => auth()->user()->id]);
            $deed->delete();
        });
        $this->reset(['selected']);
        $this->emit('deedDeleted');
        $this->closeDeletePopUp();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Acte(s) supprimé(s) avec succès'
        ]);
    }

    public function addFilter($filterName, $filterValue)
    {
        $this->filters[$filterName] = $filterValue;
        //dd($this->filters, $filterName, $filterValue);
    }
}
