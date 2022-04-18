<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ContactUs extends Component
{
    public $message;
    public $mobile;
    public $name;

    protected $rules = [
        'message' => 'required|string|min:3|max:400',
        'name' => 'required|string|min:3|max:100',
        'mobile' => 'required|numeric|digits:11',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $contactUs = \App\Models\ContactUs::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'message' => $this->message,
        ]);

        if ($contactUs)
            $this->emit('registerMedicine', 'success', 'ثبت با موفقیت انجام شد');
        else
            $this->emit('registerMedicine', 'error', 'ثبت انجام نشد');
    }
    public function render()
    {
        return view('livewire.client.contact-us')->layout('layouts.app', ['title' => 'کلینیک صبا | ارتباط با ما',]);
    }
}
