<?php

namespace App\Livewire\FullpageAdmin\Users;

use Livewire\Component;

class UsersList extends Component
{
    public function render()
    {
        return view('livewire.fullpage-admin.users.users-list')->layout('fullpageAdmin.layouts.master');
    }
}
