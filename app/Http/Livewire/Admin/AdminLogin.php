<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminLogin extends Component
{
    public $email;
    public $password;

    protected $rules = [
      'email' => 'required|email|exists:users',
      'password' => 'required|min:8',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function login()
    {
        $this->validate();
        dd($this->email);
    }


    public function render()
    {
        return view('livewire.admin.admin-login')->layout('layouts.admin-login');
    }
}
