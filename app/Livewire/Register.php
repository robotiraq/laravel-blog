<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[validate('required|min:7|max:255|email|unique:users,email')]
    public $email;
    #[validate('required|max:255')]
    public $name;
    #[validate('required|min:3|max:255|unique:users,username')]
    public $username;
    #[validate('required|min:7|max:255')]
    public $password;

    public function register()
    {
        $this->validate();
        $user= User::create($this->all());
        auth()->login($user);
        return redirect('/')->with('success','you have been registered');
    }
    public function render()
    {
        return view('livewire.register.register');
    }
}
