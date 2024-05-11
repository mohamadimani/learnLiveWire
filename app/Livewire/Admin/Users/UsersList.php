<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class UsersList extends Component
{
    public function render()
    {
        return view('livewire.admin.users.users-list')->layout('admin.layouts.master');
    }
}
