<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class ResetPasswordForm extends ModalComponent
{
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|confirmed'
    ];

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.auth.reset-password-form');
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email'                 => $this->email,
                'password'              => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token'                 => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('unauthenticated', true);
            session()->flash('alert', 'success');
            session()->flash('message', __($status));
            return redirect('/');
        }
        throw ValidationException::withMessages(['email' => __($status)]);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
