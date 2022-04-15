<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use App\Models\Medicine;
use App\Models\Pescription;
use Livewire\Component;

class RegisterPrescription extends Component
{
    /**
     * @var
     */
    public $searchLivestock;
    /**
     * @var
     */
    public $certificate;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $medicine;

    /**
     * @var string[]
     */
    protected $rules = [
        'certificate' => 'required|numeric|min:1|exists:birth_certificates,id',
        'medicine' => 'required|array|min:1',
        //'medicine.*' => 'required|numeric|min:1|exists:medicines,id',
        'description' => 'string|nullable',
    ];

    /**
     * @param $name
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $medicine = Medicine::whereIn('id', $this->medicine)->get('title')->toArray();
        $medicine = collect($medicine)->flatten()->toArray();
        $medicine = implode(',', $medicine);
        $register = Pescription::create([
            'certificate' => $this->certificate,
            'medicine' => $medicine,
            'description' => $this->description,
        ]);

        if ($register)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");
    }


    public function render()
    {
        return view('livewire.admin.register-prescription',[
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),
            'medicines' => Medicine::all(),
        ])->layout('layouts.admin-master');
    }
}
