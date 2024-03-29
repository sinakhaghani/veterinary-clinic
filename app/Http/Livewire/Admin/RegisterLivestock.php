<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use App\Models\LivestockTypeLivestock;
use App\Traits\GeneralTrait;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterLivestock extends Component
{
    use WithPagination, GeneralTrait;

    protected $paginationTheme = 'bootstrap';
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $mobile;
    /**
     * @var
     */
    public $typeLivestock;
    /**
     * @var
     */
    public $amount;
    /**
     * @var
     */
    public $address;
    /**
     * @var
     */
    public $option;
    /**
     * @var
     */
    public $searchList;
    /**
     * @var
     */
    public $livestockId;

    /**
     * @var string[]
     */
    protected $rules = [
        'name' => 'required|string|min:3|max:150',
        'typeLivestock' => 'nullable|string|max:150',
        'mobile' => 'required|numeric|unique:livestock,mobile|digits:11',
        'address' => 'max:191|string|nullable',
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
        $register = Livestock::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'type_livestock' => $this->typeLivestock,
            'address' => $this->address,
        ]);
        if ($register) {
            $this->sendSms($this->mobile, 'welcome', $this->name);
            $this->emit('registerTypeLivestock', 'success', "ثبت با موفقیت انجام شد");
        } else
            $this->emit('registerTypeLivestock', 'error', "این دام قبلا ثبت شده است");
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->livestockId = Livestock::find($id);
    }

    /**
     *
     */
    public function delete()
    {
        $delete = $this->livestockId->delete();
        if ($delete)
        {
            $this->emit('deleteModal', 'success', "حذف با موفقیت انجام شد");
        }
        else
            $this->emit('deleteModal', 'error', "متاسفم حذف انجام نشد، دوباره امتحان کنید");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.admin.register-livestock', [
            'listLivestock' => Livestock::where('mobile', "LIKE", "%$this->searchList%")
                ->orWhere('name', "LIKE", "%$this->searchList%")->latest()->paginate(10)
        ])->layout('layouts.admin-master');
    }
}
