<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RegisterMedicines extends Component
{
    public function render()
    {
        return view('livewire.admin.register-medicines')->layout('layouts.admin-master');
    }
}
