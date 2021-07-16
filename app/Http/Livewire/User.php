<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Model;


class User extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $name;
    public $email;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;

    protected function rules()
    {
        if ($this->mode == "create") {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users',

            ];
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->primaryId,

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
        $model = Model::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate);
        return view('livewire.user', [
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
        $this->email = $model->email;


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
        $model->email = $this->email;
        $model->password = bcrypt("scb123");
        $model->save();

        $this->resetForm();
        session()->flash('message', 'Utilisateur créé avec succès');
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->name = "";
        $this->email = "";
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->name = $this->name;
        $model->email = $this->email;
        $model->save();

        $this->closeForm();
        $this->resetForm();

        session()->flash('message', 'Utilisateur modifié avec succès');
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
        session()->flash('message', 'Record Deleted Successfully');
    }

    public function clearFlash()
    {
        session()->forget('message');
    }
}
