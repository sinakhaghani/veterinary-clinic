<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $numberLivestock;
    public $numberCertificate;
    public $numberPrescription;

    public function mount()
    {
        $this->numberLivestock = Livestock::all()->count();
        $this->numberCertificate = BirthCertificate::all()->count();
        $this->numberPrescription = Prescription::all()->count();
    }

    public function render()
    {
        return view('livewire.admin.index',[
            'livestockLatest' => Livestock::latest()->paginate(10),
            'certificateLatest' => BirthCertificate::with('livestock')->latest()->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
