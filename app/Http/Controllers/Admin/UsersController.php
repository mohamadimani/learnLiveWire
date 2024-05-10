<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('partialAdmin.users.list');
    }

    public function create()
    {
        return view('partialAdmin.users.create');
    }
}
