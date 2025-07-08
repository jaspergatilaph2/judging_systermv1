<?php

namespace App\Http\Controllers\Users\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function UsersIndex()
    {
        // Logic for the users dashboard can be added here
        return view('users.dashboard.dashboard'); // Assuming you have a view named 'users.dashboard'
    }
}
