<?php

namespace App\Livewire\FullpageAdmin;

use Livewire\Component;

class Panel extends Component
{
    public function render()
    {
        return view('livewire.fullpage-admin.panel')->layout('fullpageAdmin.layouts.master');
    }
}
