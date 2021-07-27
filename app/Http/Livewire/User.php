<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\User as Model;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPasswordLinkMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class User extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $name;
    public $email;

    // admin confirm paswword
    public $password;


    public $mode = 'create';

    public $allRoles;

    public $roles = [];

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;
    public $showConfirmResetPswPopup = false;

    protected function rules()
    {
        if ($this->mode == "create") {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'roles' => 'required',
                'roles.*' => 'required|exists:roles,id',

            ];
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->primaryId,
            'roles' => 'required',
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
        $this->roles = optional($model->roles)->pluck('id')->toArray();


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
        SendWelcomeEmail::dispatch($model)
            ->delay(now()->addMinutes(1));
        $this->resetForm();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Utilisateur créé avec succès'
        ]);
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->primaryId = null;
        $this->name = "";
        $this->email = "";
        $this->roles = [];
        $this->resetErrorBag();
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

    public function confirmReset($primaryId)
    {
        $this->primaryId = $primaryId;
        $this->showConfirmResetPswPopup = true;
    }

    public function sendResetLink()
    {
        $this->validate(['password' => 'required']);
        $admin = Model::find(auth()->user()->id);

        // check if the user type the good password
        if (!Hash::check($this->password, $admin->password)) {
            throw ValidationException::withMessages(['password' => 'Mot de passe incorrect!']);
        }

        $user = Model::find($this->primaryId);

        $status = Password::sendResetLink(
            ['email' => $user->email]
        );

        $this->hideResetPasswordPopup();
        $this->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Lien de réinitialisation envoyé!'
        ]);
    }

    public function hideResetPasswordPopup()
    {
        $this->primaryId = null;
        $this->password = '';
        $this->showConfirmResetPswPopup = false;
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
