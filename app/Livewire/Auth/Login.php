<?php

namespace App\Livewire\Auth;

use App\Models\Friend;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Sign in')]
#[Layout('components.layouts.app')]
class Login extends Component
{
    use LivewireAlert;

    public $email;
    public $password;

    public $messages = [
        'email.required' => 'Please enter an email address',
        'email.email' => 'Please Enter an valid email address',
        'email.exists' => 'Given email address does not exist',
        'password.required' => 'Please enter an email password',
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function signIn()
    {
        $this->validate();
        $auth = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if($auth){
            $this->flash('success', "Welcome " . Auth::user()->user_name . '!', [], '/chat');
            return $this->redirect('chat');
        }else{
            $this->alert('warning', 'Email or Password is incorrect.');
        }
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:App\Models\User,email',
            'password' => 'required',
        ];
    }
}
