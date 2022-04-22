<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminManagement extends Component
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $mobile;
    /**
     * @var
     */
    public $password;
    /**
     * @var
     */
    public $password_confirmation;
    /**
     * @var
     */
    public $userID;

    /**
     * @var string[]
     */
    protected $rules = [
        'name' => 'required|string|min:3|max:120',
        'email' => 'nullable|email|max:100|unique:users,email',
        'mobile' => 'required|numeric|digits:11|unique:users,mobile',
        'password' => 'required|min:8|max:100|confirmed',
    ];

    /**
     * @var string[]
     */
    protected $validationAttributes = [

        'name' => 'نام و نام خانوادگی'

    ];

    /**
     * @param $name
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
    }

    /**
     *
     */
    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'role' => 0,
            'password' => Hash::make($this->password),
        ]);

        if ($user)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->userID = User::find($id);
    }

    /**
     *
     */
    public function delete()
    {
        $delete = $this->userID->delete();
        if ($delete)
        {
            $this->emit('deleteModal', 'success', "حذف با موفقیت انجام شد");
        }
        else
            $this->emit('deleteModal', 'error', "متاسفم حذف انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.admin-management',[
            'listAdmins' => User::latest()->paginate(10)
        ])->layout('layouts.admin-master');
    }
}
