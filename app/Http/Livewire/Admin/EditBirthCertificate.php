<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use Livewire\Component;

class EditBirthCertificate extends Component
{
    public BirthCertificate $birthCertificate;

    public function render()
    {
        return view('livewire.admin.edit-birth-certificate')->layout('layouts.admin-master');
    }
}
