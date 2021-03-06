<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Warranty as Model;


class Warranty extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $name;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;

    protected $rules = [
        'name' => 'required',

    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $model = Model::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        return view('livewire.warranty', [
            'rows' => $model
        ]);
    }


    public function create()
    {
        $this->mode = 'create';
        $this->showForm = true;
    }


    public function edit($primaryId)
    {
        $this->mode = 'update';
        $this->primaryId = $primaryId;
        $model = Model::find($primaryId);

        $this->name = $model->name;
        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        $model = new Model();

        $model->name = $this->name;
        $model->save();

        $this->resetForm();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Garantie créée avec succès'
        ]);
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->name = "";
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->name = $this->name;
        $model->save();

        $this->resetForm();
        $this->closeForm();

        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Garantie modifiée avec succès'
        ]);
    }

    public function confirmDelete($primaryId)
    {
        $this->primaryId = $primaryId;
        $this->showConfirmDeletePopup = true;
    }

    public function destroy()
    {
        Model::find($this->primaryId)->delete();
        $this->showConfirmDeletePopup = false;
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Garantie supprimée avec succès'
        ]);
    }
}
