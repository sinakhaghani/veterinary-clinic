<?php

namespace App\Http\Livewire\Admin;

use App\Models\BirthCertificate;
use App\Models\Livestock;
use App\Models\Prescription;
use App\Models\Referred;
use Illuminate\Support\Carbon;
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
        $dateSub7 = Carbon::now()->subDays(7)->format('Y-m-d');
        $dateNow = Carbon::now()->format('Y-m-d');
        $referredMount = Referred::whereBetween('created_at', [$dateSub7." 00:00:00", $dateNow." 23:59:59"])->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $sumAmount = array();

        for ($i = 0; $i < 8; $i++)
        {
            $subDate = Carbon::now()->subDays($i)->format('Y-m-d');

            if (isset($referredMount[$subDate]))
            {
                $sumAmount[] = collect($referredMount[$subDate])->sum('amount');

            }else{
                $sumAmount[] =  0;
            }
        }

        return view('livewire.admin.index',[
            'livestockLatest' => Livestock::latest()->take(10)->get(),
            'certificateLatest' => BirthCertificate::with('livestock')->latest()->take(10)->get(),
        ])->layout('layouts.admin-master', ['sumAmount' => $sumAmount]);
    }
}
