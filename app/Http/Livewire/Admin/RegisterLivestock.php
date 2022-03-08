<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RegisterLivestock extends Component
{
    public $name;
    public $mobile;
    public $typeLivestock;
    public $address;

    protected $rules = [
        'name' => 'required|string|min:3|max:150',
        'mobile' => 'required|number|min:11|max:11',
        'typeLivestock' => 'required|integer',
        'address' => 'required|string|max:191',
    ];

    public function updated($value)
    {
        $this->validateOnly($value);
    }

    public function render()
    {
        return view('livewire.admin.register-livestock')->layout('layouts.admin-master');
    }
}
