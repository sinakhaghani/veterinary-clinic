<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use Livewire\Component;

class PanelSms extends Component
{
    public $option;
    public $typeLivestock;
    public $text;
    public $type;

    public function mount()
    {
        $this->option = Livestock::all();
    }

    public function render()
    {
        return view('livewire.admin.panel-sms')->layout('layouts.admin-master');
    }

    public function send()
    {
        
    }
}
