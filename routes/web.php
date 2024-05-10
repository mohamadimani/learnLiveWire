<?php

use App\Http\Controllers\HomeController;
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/createpost', CreatePost::class)->name('createpost');
