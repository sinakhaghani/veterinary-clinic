<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use Livewire\Component;

class RegisterBirthCertificate extends Component
{
    public $typeLivestock;
    public $nameLive;
    public $dateBirth;
    public $race;
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
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => 'date',
        'typeLivestock' => 'required|min:1|exists:type_livestock,id',
        'sex' => 'max:191',
        'color' => 'max:191',
        'race' => 'max:191',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $register = BirthCertificate::create([
            'name' => $this->nameLive,
            'type' => $this->typeLivestock,
            'race' => $this->race,
            'date_birth' => $this->dateBirth,
            'sex' => $this->sex,
            'color' => $this->color,
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
