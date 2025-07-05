<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveVoteController extends Controller
{
    public function vote(){
        return view('live.vote');
    }
}
