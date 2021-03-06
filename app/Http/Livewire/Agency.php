<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Agency as Model;


class Agency extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $code;
    public $name;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;


    protected function rules()
    {
        if ($this->mode == "create") {
            return [
                'code' => 'required|unique:agencies',
                'name' => 'required|unique:agencies',

            ];
        }
        return [
            'code' => 'required|unique:agencies,code,' . $this->primaryId,
            'name' => 'required|unique:agencies,name,' . $this->primaryId,

        ];
    }



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
        $model = Model::where('code', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);
        return view('livewire.agency', [
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

        $this->code = $model->code;
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

        $model->code = $this->code;
        $model->name = $this->name;
        $model->save();

        $this->resetForm();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Agence cr????e avec succ??s'
        ]);
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->code = "";
        $this->name = "";
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->code = $this->code;
        $model->name = $this->name;
        $model->save();

        $this->resetForm();
        $this->closeForm();

        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Agence modifi??e avec succ??s'
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
            'message' => 'Agence supprim??e avec succ??s'
        ]);
    }
}
