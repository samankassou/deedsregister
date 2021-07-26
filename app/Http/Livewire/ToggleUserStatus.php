<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ToggleUserStatus extends Component
{
    public $user;

    protected $rules = ['user.status' => 'required'];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.toggle-user-status');
    }

    public function updated()
    {
        $this->user->save();
    }
}
