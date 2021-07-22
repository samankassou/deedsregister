<?php

namespace App\Http\Livewire;

use App\Models\Role;
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

    public $allRoles;

    public $roles = [];

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
                'roles.*' => 'required|exists:roles,id',

            ];
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->primaryId,
            'roles.*' => 'required|exists:roles,id'

        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->allRoles = Role::all();
        $model = Model::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate);
        return view('livewire.user', [
            'rows' => $model,
            'allRoles' => $this->allRoles
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
        $this->roles = $model->roles->pluck('id')->toArray();


        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->resetForm();
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

        $model->roles()->attach($this->roles);

        $this->resetForm();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Utilisateur créé avec succès'
        ]);
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->name = "";
        $this->email = "";
        $this->roles = [];
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->name = $this->name;
        $model->email = $this->email;
        $model->save();
        $model->roles()->sync($this->roles);

        $this->closeForm();
        $this->resetForm();

        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Utilisateur modifié avec succès'
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
            'message' => 'Utilisateur supprimé avec succès'
        ]);
    }
}
