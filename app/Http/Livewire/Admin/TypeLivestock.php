<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TypeLivestock extends Component
{
    public $nameLivestock;
    public $medicine;

    protected $rules = [
        'nameLivestock' => 'required|string|min:2|max:100',
        'medicine' => 'string|max:500',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $register = \App\Models\TypeLivestock::firstOrCreate([
        'name' => $this->nameLivestock,
        'medicine' => $this->medicine,
    ]);
        if ($register)
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('registerTypeLivestock', 'error', "ثبت انجام نشد، لطفا دوباره امتحان کنید");
    }

    public function render()
    {
        return view('livewire.admin.type-livestock')->layout('layouts.admin-master');
    }
}
