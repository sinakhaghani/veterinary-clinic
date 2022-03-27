<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RegisterBirthCertificate extends Component
{
    public $typeLivestock;
    public $name;
    public $dateBirth;
    public $sex;
    public $color;
    public $option;

    public function render()
    {
        return view('livewire.admin.register-birth-certificate')->layout('layouts.admin-master');
    }

    public function mount()
    {
        $this->option = \App\Models\TypeLivestock::all();
    }

    protected $rules = [
        'name' => 'required|string|min:2|max:150',
        'dateBirth' => 'date',
        'typeLivestock.*' => 'required|min:1|exists:type_livestock,id',
        'sex' => 'max:191',
        'color' => 'max:191',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        dd(23233);
        $register = Livestock::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
        ]);
        if ($register) {
            foreach ($this->typeLivestock as $livestock) {
                $live = new LivestockTypeLivestock();
                $live->livestock_id = $register->id;
                $live->type_livestock_id = $livestock;
                $live->save();
            }
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        } else
            $this->emit('registerTypeLivestock', 'error', "این دام قبلا ثبت شده است");
    }
}
