<?php

namespace App\Http\Controllers\Users\participants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participants;

class ParticipantsController extends Controller
{
    public function index(){
        return view('users.participants.create',[
            'ActiveTab' => 'participants',
            'SubActiveTab' => 'Create Tab'
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'student_id' => 'required|string|regex:/^\d{7,}-\d{1,}$/',
            'student_name' => 'required|string|max:255',
            'contest_type' => 'required|string|max:255',
            'contest_category' => 'required|string|max:255'
        ]);

        $participants = Participants::create($request->all());

        return redirect()->route('users.participants.participants')->with('success','Participants created successfully!!');
    }
}
