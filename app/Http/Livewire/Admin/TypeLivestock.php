<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicine;
use App\Models\MedicineLiveStock;
use Livewire\Component;

class TypeLivestock extends Component
{
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $medicine;
    /**
     * @var
     */
    public $medicineGet;

    /**
     *
     */
    public function mount()
    {
        $this->medicineGet = Medicine::all();
    }

    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|string|min:2|max:100',
        //'medicine.*' => 'required|numeric|min:1',
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
        $register = \App\Models\TypeLivestock::firstOrCreate([
            'title' => $this->title,
        ]);

        if ($register)
            $this->emit('register', 'success', "ثبت با موفقیت انجام شد");
         else
            $this->emit('register', 'error', "این دام قبلا ثبت شده است");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.type-livestock')->layout('layouts.admin-master');
    }
}
