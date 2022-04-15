<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.client.contact-us')->layout('layouts.app', ['title' => 'کلینیک صبا | ارتباط با ما',]);
    }
}
