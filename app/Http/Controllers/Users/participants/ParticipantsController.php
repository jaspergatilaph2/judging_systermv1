<?php

namespace App\Http\Controllers\Users\participants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index(){
        return view('users.participants.create',[
            'ActiveTab' => 'participants',
            'SubActiveTab' => 'Create Tab'
        ]);
    }


    public function store(Request $request){
        
    }
}
