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


    public function render()
    {
        $toDoList =  ToDo::whereIn('status',   [1, 2])->orderBy('id',   'DESC')->paginate(10);
        return view('livewire.admin.todo.to-do-list', compact('toDoList'))->layout('admin.layouts.master');
    }

    public function addTodo()
    {
        ToDo::create([
            'title' => $this->title,
            'status' => true,
            'img' => '',
            'user_id' => 1,
        ]);
        unset($this->title);
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
        $this->isEdit = $todo->id;
    }

    public function update($toDoId)
    {
        $todo = ToDo::find($toDoId);
        $todo->title  = $this->title;
        $todo->save();
    }

    public function done($toDoId)
    {
        $todo = ToDo::find($toDoId);
        $todo->status  = 2;
        $todo->save();
    }
}
