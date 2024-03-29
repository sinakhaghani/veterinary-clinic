<?php

namespace App\Http\Livewire\Admin;

use App\Jobs\SmsReferralReminder;
use App\Models\BirthCertificate;
use App\Models\Livestock;
use App\Models\Referred;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Queue;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterReferred extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    /**
     * @var
     */
    public $owner;
    /**
     * @var
     */
    public $amount;
    /**
     * @var
     */
    public $searchList;
    /**
     * @var
     */
    public $searchOwner;
    /**
     * @var
     */
    public $referredId;
    /**
     * @var
     */
    public $next_visit;

    /**
     * @var string[]
     */
    protected $rules = [
        'owner' => 'required|numeric|min:1|exists:livestock,id',
        'amount' => 'nullable|numeric',
        'next_visit' => 'nullable|date',
    ];
    /**
     * @var mixed
     */


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
        $register = Referred::create([
            'owner' => $this->owner,
            'amount' => !empty($this->amount) ? $this->amount : null,
        ]);
        if ($register) {
            if (empty($this->next_visit))
                $this->next_visit = null;

            $nextVisit = Livestock::find($this->owner);
            $nextVisit->next_visit = $this->next_visit;
            $nextVisit->save();

            if (!empty($this->next_visit))
            {
                $owner = $register->owner;
                $birthCertificate = BirthCertificate::where('owner', $owner)->get()->toArray();
                $nameAnimal = collect($birthCertificate)->whereNotNull('name')->first();
                $nameAnimal = (!empty($nameAnimal)) ? $nameAnimal['name'] : ' ';
                $tel = env('TEL');
                $carbon = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d', $this->next_visit);
                Queue::later($carbon->subDays(), new SmsReferralReminder($nextVisit->mobile, 'reminder', $this->next_visit, $nameAnimal, $tel));
            }

            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        } else
            $this->emit('registerTypeLivestock', 'error', "این دام قبلا ثبت شده است");
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->referredId = Referred::find($id);
    }

    /**
     *
     */
    public function delete()
    {
        $delete = $this->referredId->delete();
        if ($delete)
        {
            $this->emit('deleteModal', 'success', "حذف با موفقیت انجام شد");
        }
        else
            $this->emit('deleteModal', 'error', "متاسفم حذف انجام نشد، دوباره امتحان کنید");
    }

    public function render()
    {
        return view('livewire.admin.register-referred', [
            'listReferred' => Referred::with('livestock')->whereHas('livestock', function($query){
                $query->where('name', "LIKE", "%$this->searchList%");
            })->latest()->paginate(10),
            'listOwner' => Livestock::where('mobile', "LIKE", "%$this->searchOwner%")
                ->orWhere('name', "LIKE", "%$this->searchOwner%")->get()->toArray(),
        ])->layout('layouts.admin-master');
    }
}
