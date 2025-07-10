<?php

namespace App\Http\Controllers\Users\participants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participants;

class ParticipantsController extends Controller
{
    public function index()
    {
        return view('users.participants.create', [
            'ActiveTab' => 'participants',
            'SubActiveTab' => 'Create Tab'
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'student_id' => [
                'required',
                'regex:/^\d{7,}-\d{1,}$/',
                'unique:participants,student_id', // ✅ check if already exists
            ],
            'student_name' => 'required|string|max:255',
            'contest_type' => 'required|string|max:255',
            'contest_category' => 'required|string|max:255'
        ]);

        $participants = Participants::create($request->all());

        return redirect()->route('users.participants.participants')->with('success', 'Participants created successfully!!');
    }

    public function view()
    {
        $participants = Participants::all();
        return view('users.participants.view', compact('participants'), [
            'ActiveTab' => 'view',
            'SubActiveTab' => 'entries review'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|string',
            'student_name' => 'required|string',
            'contest_category' => 'required|string',
            'contest_type' => 'required|string',
        ]);

        $participant = Participants::findOrFail($id);
        $participant->update($request->only(['student_id', 'student_name', 'contest_category', 'contest_type']));

        return back()->with('success', 'Participant updated successfully!');
    }

    public function destroy($id)
    {
        $participant = Participants::findOrFail($id);
        $participant->delete();
        return back()->with('success', 'Deleted successfully !!');
    }
}
