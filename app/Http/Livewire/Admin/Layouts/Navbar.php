<?php

namespace App\Http\Livewire\Admin\Layouts;

use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function render()
    {
        return view('livewire.admin.layouts.navbar');
    }
}
