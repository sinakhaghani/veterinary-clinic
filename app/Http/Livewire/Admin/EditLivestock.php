<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use Livewire\Component;

class EditLivestock extends Component
{
    /**
     * @var Livestock
     */
    public Livestock $livestock;
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
    public $gender;
    /**
     * @var
     */
    public $amount;
    /**
     * @var
     */
    public $typeLivestock;
    /**
     * @var
     */
    public $address;

    /**
     * @var string[]
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'mobile' => 'required|numeric|digits:11|unique:livestock,mobile,'.$this->livestock['id'],
            'typeLivestock' => 'nullable|string|max:100',
            'amount' => 'nullable|numeric',
            'gender' => 'required|in:f,m',
            'address' => 'max:191|string|nullable',
        ];
    }

    /**
     * @param $name
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updating($name)
    {
        $this->validateOnly($name);
    }

    /**
     *
     */
    public function mount()
    {
        $this->name = $this->livestock['name'];
        $this->mobile = $this->livestock['mobile'];
        $this->typeLivestock = $this->livestock['type_livestock'];
        $this->gender = $this->livestock['gender'];
        $this->amount = $this->livestock['amount'];
        $this->address = $this->livestock['address'];
    }

    /**
     *
     */
    public function update()
    {
       $this->validate();
       $update = $this->livestock->update([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'type_livestock' => $this->typeLivestock,
            'gender' => $this->gender,
            'amount' => $this->amount,
            'address' => $this->address,
        ]);

        if ($update) {
            $this->emit('deleteModal', 'success', "بروزرسانی با موفقیت انجام شد");
        } else
            $this->emit('deleteModal', 'error', "بروزرسانی انجام نشد، لطفا دوباره امتحان کنید");
    }

    public function render()
    {
        return view('livewire.admin.edit-livestock')->layout('layouts.admin-master');
    }
}
