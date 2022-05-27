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
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->numberLivestock = Livestock::all()->count();
        $this->numberCertificate = BirthCertificate::all()->count();
        $this->numberPrescription = Prescription::all()->count();
    }

    public function render()
    {
        return view('livewire.admin.index',[
            'livestockLatest' => Livestock::latest()->take(10)->get(),
            'certificateLatest' => BirthCertificate::with('livestock')->latest()->take(10)->get(),
        ])->layout('layouts.admin-master');
    }
}
