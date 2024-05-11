<?php

namespace App\Livewire\Home;

use Livewire\Component;

class CourseDetail extends Component
{
    public function render()
    {
        return view('livewire.home.course-detail')->layout('layouts.home');
    }
}
