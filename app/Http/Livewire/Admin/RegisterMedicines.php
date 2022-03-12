<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicine;
use Livewire\Component;

class RegisterMedicines extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|string|min:1',
        'description' => 'string',
    ];
    public function updated($name)
    {
        $this->validateOnly($name);
    }
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
    public function render()
    {
        return view('livewire.admin.register-medicines')->layout('layouts.admin-master');
    }
}
