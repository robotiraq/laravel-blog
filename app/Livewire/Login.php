<?php

namespace App\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email|exists:users,email')]
    public $email;
    #[Validate('required')]
    public $password;

    public function login()
    {

        $this->validate();

        if (!auth()->attempt($this->all())){
            throw ValidationException::withMessages([
                'email' => 'Wrong email or password'
            ]);
        }

        session()->regenerate();
        return redirect('/');
    }

    public function render()
    {

        return view('livewire.login')->layout('components.layout');
    }
}
