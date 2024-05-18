<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $users = User::paginate(1);
        return view('livewire.admin.users.users-list',compact('users'))->layout('admin.layouts.master');
    }
}
