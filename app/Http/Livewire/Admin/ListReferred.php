<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class ListReferred extends Component
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
    public $searchList;
    /**
     * @var
     */
    public $searchOwner;
    /**
     * @var
     */
    public $list;
    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->owner = $id;
    }

    public function render()
    {
        return view('livewire.admin.list-referred', [
            'listOwner' => Livestock::where('mobile', "LIKE", "%$this->searchOwner%")
                ->orWhere('name', "LIKE", "%$this->searchOwner%")->get()->toArray(),
            'listReferred' => Prescription::with('livestock')->where('owner', $this->owner)->latest()->paginate(10),
        ])->layout('layouts.admin-master');
    }
}
