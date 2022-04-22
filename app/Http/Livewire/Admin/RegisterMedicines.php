<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicine;
use Livewire\Component;

class RegisterMedicines extends Component
{
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $medicineID;

    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|string|min:1',
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
     *
     */
    public function register()
    {
        $this->validate();
        $medicine = Medicine::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        if ($medicine)
            $this->emit('registerMedicine', 'success', 'ثبت با موفقیت انجام شد');
        else
            $this->emit('registerMedicine', 'error', 'ثبت انجام نشد');
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->medicineID = Medicine::find($id);
    }

    /**
     *
     */
    public function delete()
    {
        $delete = $this->medicineID->delete();
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
        return view('livewire.admin.register-medicines',[
            'listMedicine' => Medicine::latest()->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
