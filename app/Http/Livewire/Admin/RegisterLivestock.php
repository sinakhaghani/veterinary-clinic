<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use App\Models\LivestockTypeLivestock;
use Livewire\Component;

class RegisterLivestock extends Component
{
    public $name;
    public $mobile;
    public $typeLivestock;
    public $address;
    public $option;

    protected $rules = [
        'name' => 'required|string|min:3|max:150',
        'mobile' => 'required|numeric|unique:livestock,mobile|digits:11',
        'address' => 'max:191|string|nullable',
    ];

    public function mount()
    {
        $this->option = \App\Models\TypeLivestock::all();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $register = Livestock::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
        ]);
        if ($register) {
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        } else
            $this->emit('registerTypeLivestock', 'error', "این دام قبلا ثبت شده است");
    }

    public function render()
    {
        return view('livewire.admin.register-livestock')->layout('layouts.admin-master');
    }
}
