<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $password;
    public $mobile;
    public $img;

    #[Url(as: 'q', history: true, except: '')]
    public $search;

    public $editUser = null;
    public $sortId = true;
    public $editInLine = null;

    public $editInLineUser = null;



    // public function deleteAlert($userId)
    // {
    //     $this->dispatch('deleteRow', id: $userId);
    // }

    #[On('delete')]
    public function delete($userId)
    {
        $user = User::find($userId);
        $userName = $user->name;
        $user->delete();
        // session()->flash('deleted', ' اطلاعات شخص ' .  $userName . ' با موفقیت حذف شد! ');
    }

    public function editRow($userId)
    {
        $this->editInLineUser = User::find($userId);
        $this->name = $this->editInLineUser->name;
        $this->mobile = $this->editInLineUser->mobile;
        $this->email = $this->editInLineUser->email;

        $this->editInLine = $userId;
    }

    public function updateRow($userId)
    {
        $this->editInLineUser->name = $this->name;
        $this->editInLineUser->mobile = $this->mobile;
        $this->editInLineUser->email = $this->email;
        $this->editInLineUser->save();

        $this->editInLine = null;
    }

    public function placeholder()
    {
        return <<<'HTML'
                      <div> loading data ... </div>
        HTML;
    }

    public function render()
    {
        if ($this->search and mb_strlen($this->search) > 1) {
            $users = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', $this->sortId ? 'ASC' : 'DESC')->paginate(10);
        } else {
            $users = User::orderBy('id', $this->sortId ? 'ASC' : 'DESC')->paginate(10);
        }
        return view('livewire.admin.users.users-list', compact('users'))->layout('admin.layouts.master');
    }

    public function mount()
    {
    }

    // make query with catch every 60 second update query
    #[Computed(persist: true, seconds: 60)]
    public function users()
    {
        if ($this->search and mb_strlen($this->search) > 1) {
            $users = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', $this->sortId ? 'ASC' : 'DESC')->paginate(10);
        } else {
            $users = User::orderBy('id', $this->sortId ? 'ASC' : 'DESC')->paginate(10);
        }
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->editUser = $user->id;
    }

    public function saveEdit($userId)
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $userId,
            'mobile' => 'required|digits:11',
            // 'password' => 'required|min:6',
            // 'img' => 'image'
        ]);

        $user = User::find($userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->mobile = $this->mobile;

        if ($user->save()) {
            $this->reset('name', 'email', 'password', 'mobile', 'img');
            session()->flash('success', 'با موفقیت ویرایش شد');
        } else {
            session()->flash('error', 'مشکل در ویرایش');
        }

        $this->editUser = null;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'mobile' => 'required|digits:11',
            'img' => 'image'
        ]);

        $name = '';
        if ($this->img) {
            $name = time() . rand(10, 99) . '.' .  $this->img->getClientOriginalExtension();
            $this->img->storeAs('userImages', $name, 'public');
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'mobile' => $this->mobile,
            'img' => $name,
        ]);

        if ($user) {
            $this->reset('name', 'email', 'password', 'mobile', 'img');
            session()->flash('success', 'با موفقیت ثبت شد');
        } else {
            session()->flash('error', 'مشکل در ثبت');
        }
    }
}
