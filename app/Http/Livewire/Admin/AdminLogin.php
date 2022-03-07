<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email;
    public $password;

    protected $rules = [
      'email' => 'required|email|exists:users,email',
      'password' => 'required|min:8',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function login()
    {
        $this->validate();
        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password]))
            return redirect()->route('admin.main');
        $this->emit('validateLogin', 'error', "ایمیل یا رمز عبور اشتباه است");
    }


    public function render()
    {
        return view('livewire.admin.admin-login')->layout('layouts.admin-login');
    }
}
