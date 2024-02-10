<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Sign up')]
class Register extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $name;
    public $userName;
    public $messages = [
        'email.required' => 'Email address is required',
        'email.email' => 'Please enter valid email address',
        'email.unique' => 'Sorry email address already taken',
        'password.required' => 'Please enter password',
        'password.same' => 'Password and confirm password not matching',
        'password.min' => 'Password Should be min 6 characters long',
        'password.required_with' => 'Confirm password is required',
        'userName.required' => 'User name is required',
        'userName.max' => 'User name should be max 150 characters long',
        'password_confirmation.min' => 'Password Should be min 6 characters long',
    ];

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function signUp()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'name' => 'required|max:150',
            'userName' => 'required|max:150',
        ];
    }
}
