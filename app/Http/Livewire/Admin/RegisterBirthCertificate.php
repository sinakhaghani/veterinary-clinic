<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterBirthCertificate extends Component
{
    use WithPagination;

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
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => 'required|date',
        'typeLivestock' => 'required|min:1|string|max:50',
        'sex' => 'max:191',
        'color' => 'max:191',
        'race' => 'max:191',
    ];

    /**
     * @param $name
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
    }

    /**
     *
     */
    public function register()
    {

        $this->validate();
        $serial = mt_rand(1000,9999);
        $checkSerial = BirthCertificate::where('serial', $serial)->first();
        while (!empty($checkSerial))
        {
            $serial = mt_rand(1000,9999);
            $checkSerial = BirthCertificate::where('serial', $serial)->first();
        }

        $register = BirthCertificate::create([
            'serial' => $serial,
            'name' => $this->nameLive,
            'owner' => $this->owner,
            'type_livestock' => $this->typeLivestock,
            'race' => $this->race,
            'date_birth' => $this->dateBirth,
            'sex' => $this->sex,
            'color' => $this->color,
        ]);

        if ($register)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.register-birth-certificate', [
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),
            'listDateBirth' => BirthCertificate::with('livestock')->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
