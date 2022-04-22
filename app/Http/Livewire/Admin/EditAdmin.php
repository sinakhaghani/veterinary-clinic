<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditAdmin extends Component
{
    /**
     * @var User
     */
    public User $admin;
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
     *
     */
    public function mount()
    {
        $this->name = $this->admin['name'];
        $this->email = $this->admin['email'];
        $this->mobile = $this->admin['mobile'];
    }

    /**
     * @var string[]
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:120',
            'email' => 'nullable|email|max:100|unique:users,email,'.$this->admin['id'],
            'mobile' => 'required|numeric|digits:11|unique:users,mobile,'.$this->admin['id'],
        ];
    }

    /**
     * @param $value
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($value)
    {
        $this->validateOnly($value);
    }

    /**
     *
     */
    public function update()
    {
        $this->validate();
        $update = $this->admin->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        if ($update)
            $this->emit('register', 'success', "بروزرسانی با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم بروزرسانی انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.edit-admin')->layout('layouts.admin-master');
    }
}
