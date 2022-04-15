<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.client.index')->layout('layouts.app', ['title' => 'کلینیک صبا | صفحه اصلی']);
    }
}
