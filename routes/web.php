<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Livewire\CreatePost;
use App\Livewire\FullpageAdmin\Panel;
use App\Livewire\FullpageAdmin\Users\Create;
use App\Livewire\FullpageAdmin\Users\UsersList;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/createpost', CreatePost::class)->name('createpost');


Route::get('/admin', [PanelController::class , 'index'])->name('admin');
Route::get('/admin/users', [UsersController::class , 'index'])->name('admin.users_list');
Route::get('/admin/users/create', [UsersController::class , 'create'])->name('admin.users_create');


Route::get('users/create' , Create::class)->name('users.create');
Route::get('users' , UsersList::class)->name('users');
Route::get('/admin/panel' , Panel::class)->name('admin.panel');
