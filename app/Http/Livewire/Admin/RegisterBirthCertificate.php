<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use Livewire\Component;

class RegisterBirthCertificate extends Component
{
    public $typeLivestock;
    public $owner;
    public $nameLive;
    public $dateBirth;
    public $race;
    public $sex;
    public $color;
    public $option;
    public $livestock;

    public function render()
    {
        return view('livewire.admin.register-birth-certificate')->layout('layouts.admin-master');
    }

    public function mount()
    {
        $this->option = \App\Models\TypeLivestock::all();
        $this->livestock = Livestock::all();
    }

    protected $rules = [
        'owner' => 'required|numeric|min:1',
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => '',
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
    {dd($this);
        $this->validate();

        $register = BirthCertificate::create([
            'name' => $this->nameLive,
            'owner' => $this->owner,
            'type' => $this->typeLivestock,
            'race' => $this->race,
            'date_birth' => $this->dateBirth,
            'sex' => $this->sex,
            'color' => $this->color,
        ]);
        if ($register) {
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        } else
            $this->emit('registerTypeLivestock', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }
}
