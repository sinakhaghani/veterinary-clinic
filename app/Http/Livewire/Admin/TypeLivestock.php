<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicine;
use Livewire\Component;

class TypeLivestock extends Component
{
    public $nameLivestock;
    public $medicine;
    public $medicineGet;

    public function mount()
    {
        $this->medicineGet = Medicine::all();
    }

    protected $rules = [
        'nameLivestock' => 'required|string|min:2|max:100',
        'medicine.*' => 'numeric|min:1',
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
    ]);
        if (!$register->exists)
        {
            /*foreach ($this->medicine as $medicine)
            {

            }*/
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        }

        else
            $this->emit('registerTypeLivestock', 'error', "این دام قبلا ثبت شده است");
    }

    public function render()
    {
        return view('livewire.admin.type-livestock')->layout('layouts.admin-master');
    }
}
