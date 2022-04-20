<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use Livewire\Component;

class EditBirthCertificate extends Component
{
    /**
     * @var BirthCertificate
     */
    public BirthCertificate $birthCertificate;
    /**
     * @var
     */
    public $typeLivestock;
    /**
     * @var
     */
    public $owner;
    /**
     * @var
     */
    public $nameLive;
    /**
     * @var
     */
    public $dateBirth;
    /**
     * @var
     */
    public $race;
    /**
     * @var
     */
    public $sex;
    /**
     * @var
     */
    public $color;
    /**
     * @var
     */
    public $searchLivestock;

    /**
     *
     */
    public function mount()
    {
        $this->nameLive = $this->birthCertificate['name'];
        $this->owner = $this->birthCertificate['owner'];
        $this->dateBirth = $this->birthCertificate['date_birth'];
        $this->race = $this->birthCertificate['race'];
        $this->sex = $this->birthCertificate['sex'];
        $this->color = $this->birthCertificate['color'];
        $this->typeLivestock = $this->birthCertificate['type_livestock'];
    }

    /**
     * @var string[]
     */
    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => 'required|date',
        'typeLivestock' => 'required|min:1|string|max:50',
        'sex' => 'max:191|string|nullable',
        'color' => 'max:191|string|nullable',
        'race' => 'max:191|string|nullable',
    ];

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
        $update = $this->birthCertificate->update([
            'name' => $this->nameLive,
            'owner' => $this->owner,
            'type_livestock' => $this->typeLivestock,
            'race' => $this->race,
            'date_birth' => $this->dateBirth,
            'sex' => $this->sex,
            'color' => $this->color,
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
        return view('livewire.admin.edit-birth-certificate',[
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),
        ])->layout('layouts.admin-master');
    }
}
