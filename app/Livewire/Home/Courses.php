<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        return view('livewire.home.courses')->layout('layouts.home');
    }
}
