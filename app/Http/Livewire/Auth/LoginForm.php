<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\ValidationException;

class LoginForm extends ModalComponent
{
    public $email = "";
    public $password = "";
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    public function login()
    {
        $this->validate();
        $credentials = ['email' => $this->email, 'password' => $this->password];
        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        $this->password = "";
        throw ValidationException::withMessages([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
