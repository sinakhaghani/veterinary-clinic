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
     * @var
     */
    public $delete;
    /**
     * @var
     */
    public $certificateId;
    /**
     * @var string
     */
    /**
     * @var
     */
    public $searchList;

    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
        'nameLive' => 'required|string|min:2|max:150',
        'dateBirth' => 'required|date',
        'typeLivestock' => 'required|numeric|in:0,1',
        'sex' => 'max:191|string|nullable',
        'color' => 'max:191|string|nullable',
        'race' => 'max:191|string|nullable',
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

        $serialModel = BirthCertificate::latest()->first();
        if (!is_null($serialModel))
        {
            $serial = ($this->typeLivestock == 0) ? $serialModel->serialDog() : $serialModel->serialCat();
        }
        else{
            $serial = ($this->typeLivestock == 0) ? 'D1400' : 'C1400';
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

    public function setId($id)
    {
        $this->certificateId = BirthCertificate::find($id);
    }

    public function delete()
    {
        $delete = $this->certificateId->delete();
        if ($delete)
        {
            $this->emit('deleteModal', 'success', "حذف با موفقیت انجام شد");
        }
        else
            $this->emit('deleteModal', 'error', "متاسفم حذف انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.register-birth-certificate', [
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->orWhere('mobile' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),
            'listDateBirth' => BirthCertificate::with('livestock')->where('name', "LIKE", "%$this->searchList%")
        ->orWhere('id', "LIKE", "%$this->searchList%")->latest()->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
