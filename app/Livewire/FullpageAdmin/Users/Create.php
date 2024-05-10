<?php

namespace App\Livewire\FullpageAdmin\Users;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.fullpage-admin.users.create')->layout('fullpageAdmin.layouts.master');
    }
}
