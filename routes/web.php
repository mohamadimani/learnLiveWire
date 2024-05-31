<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Livewire\CreatePost;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Users\Create;
use App\Livewire\Admin\Users\UsersList;
use App\Livewire\Home\CourseDetail;
use App\Livewire\Home\Courses;
use App\Livewire\Home\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Todo\ToDoList;
use Illuminate\Support\Facades\Artisan;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/createpost', CreatePost::class)->name('createpost');


// Route::get('/admin', [PanelController::class , 'index'])->name('admin');
// Route::get('/admin/users', [UsersController::class , 'index'])->name('admin.users_list');
// Route::get('/admin/users/create', [UsersController::class , 'create'])->name('admin.users_create');


Route::get('/', Index::class)->name('home');
Route::get('/courses', Courses::class)->name('courses');
Route::get('/courses/detail', CourseDetail::class)->name('courses.detail');

Route::get('/admin', Panel::class)->name('admin');
Route::get('users', UsersList::class)->name('admin.users');
Route::get('todo', ToDoList::class)->name('admin.todo');


Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    echo $exitCode . ' Done! ';
});
