<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Panel extends Component
{
    public function render()
    {
        return view('livewire.admin.index')->layout('admin.layouts.master');
    }
}
