<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Participants;

class AdminController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.dashboard.index', compact('user'));
    }

    public function view(){
        $participants = Participants::all();
        return view('admin.participants.view', compact('participants'),[
            'ActiveTab' => 'admin',
            'SubActiveTab' => 'participants'
        ]);
    }
}
