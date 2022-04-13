<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditProfile extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $password;
    public $password_confirmation;

    /**
     * @var string[]
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|string|min:2,max:120|unique:users,email,'.auth()->id(),
            'mobile' => 'required|numeric|digits:11|unique:users,mobile,'.auth()->id(),
        ];
    }

    protected $validationAttributes = [

        'name' => 'نام و نام خانوادگی'

    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function change()
    {
        $this->validate();
        $user = User::where('id', auth()->id())->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        if ($user)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }

    public function changePassword()
    {
        $validatedData = $this->validate([
            'password' => 'required|min:8|max:100|confirmed',
        ]);

        $user = User::where('id', auth()->id())->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        if ($user)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }

    public function render()
    {
        return view('livewire.admin.edit-profile', [
            'users' => auth()->user()
        ])->layout('layouts.admin-master');
    }
}
