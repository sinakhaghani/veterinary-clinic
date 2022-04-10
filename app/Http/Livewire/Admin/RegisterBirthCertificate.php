<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterBirthCertificate extends Component
{
    use WithPagination;

    public $typeLivestock;
    public $owner;
    public $nameLive;
    public $dateBirth;
    public $race;
    public $sex;
    public $color;
    public $option;
    public $searchLivestock;

    public function render()
    {
       // $livestock = ;
        return view('livewire.admin.register-birth-certificate', [
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),

        ])->layout('layouts.admin-master');
    }

    public function mount()
    {
        $this->option = \App\Models\TypeLivestock::all();
    }

    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => 'required|date',
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
