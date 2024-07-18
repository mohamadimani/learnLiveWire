<?php

namespace App\Livewire\Admin\Todo;

use App\Models\ToDo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ToDoList extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $title;
    public $isEdit = false;
    public $loaded = false;
    public $img;
    public $editImg;


    public function render()
    {
        $toDoList =  ToDo::whereIn('status',   [1, 2])->orderBy('id',   'DESC')->paginate(5);
        return view('livewire.admin.todo.to-do-list', compact('toDoList'))->layout('admin.layouts.master');
    }

    public function checkTitle()
    {
        $this->validate([
            'title' => 'required|string|min:4',
        ]);
    }

    public function addTodo()
    {
        $this->validate([
            'title' => 'required|string|min:4',
            'img' => 'required|image',
        ]);

        $image = '';
        if ($this->img) {
            $image = time() . rand(10, 99) . '.' .  $this->img->getClientOriginalExtension();
            $this->img->storeAs('todoImages', $image, 'public');
        }

        ToDo::create([
            'title' => $this->title,
            'status' => true,
            'img' => $image,
            'user_id' => 1,
        ]);

        unset($this->title);
        unset($this->img);
    }

    public function delete($toDoId)
    {
        $todo = ToDo::find($toDoId);
        $todo->update([
            'status' => false,
        ]);
    }

    public function edit($toDoId)
    {
        $todo = ToDo::find($toDoId);
        $this->title = $todo->title;
        $this->editImg = $todo->img;
        $this->isEdit = $todo->id;
    }

    public function update($toDoId)
    {
        $image = '';
        if ($this->img) {
            $image = time() . rand(10, 99) . '.' .  $this->img->getClientOriginalExtension();
            $this->img->storeAs('todoImages', $image, 'public');
        }

        $todo = ToDo::find($toDoId);
        $todo->title  = $this->title;
        $todo->img  = !empty($image) ? $image :  $todo->img;
        $todo->save();

        unset($this->title);
        unset($this->img);
        unset($this->editImg);
        $this->isEdit = false;
    }

    public function done($toDoId)
    {
        $todo = ToDo::find($toDoId);
        $todo->status  = 2;
        $todo->save();
    }
}
