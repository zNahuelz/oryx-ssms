<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => ['required','email','max:50'],
        'password' => ['required','min:5']
    ];

    public function login()
    {
        $this->validate();

        if(!Auth::attempt(['email' => $this->email,'password'=>$this->password])){
            $this->addError('email','Credenciales incorrectas.');
            return;
        }
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
