<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterPrescription extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    protected $paginationTheme = 'bootstrap';
    /**
     * @var
     */
    public $searchLivestock;
    /**
     * @var
     */
    public $owner;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $certificateID;
    /**
     * @var
     */
    public $dataPdf;

    /**
     * @var string[]
     */
    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
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

    /**
     * @return void
     */
    public function register()
    {
        $this->validate();
        $register = Prescription::create([
            'owner' => $this->owner,
            'description' => $this->description,
        ]);

        if ($register)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
        else
            $this->emit('register', 'error', "متاسفم ثبت انجام نشد، دوباره امتحان کنید");


    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->certificateID = Prescription::find($id);
    }

    /**
     *
     */
    public function delete()
    {
        $delete = $this->certificateID->delete();
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
        return view('livewire.admin.register-prescription',[
            'livestock' => Livestock::where('name' , "LIKE", "%{$this->searchLivestock}%")->orWhere('mobile' , "LIKE", "%{$this->searchLivestock}%")->get()->toArray(),
            'listPrescription' => Prescription::with('livestock')->latest()->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
