<?php

namespace App\Http\Controllers\Users\participants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participants;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
                'unique:participants,student_id',
            ],
            'student_name' => 'required|string|max:255',
            'contest_type' => 'required|string|max:255',
            'contest_category' => 'required|string|max:255',

            // group_team required only for Group or Team
            'group_team' => [
                Rule::requiredIf(function () use ($request) {
                    return in_array(strtolower($request->contest_type), ['group', 'team']);
                }),
                'nullable',
                'string',
                'max:255',
            ],

            // duo_name required only for Duo
            'duo_name' => [
                Rule::requiredIf(function () use ($request) {
                    return strtolower($request->contest_type) === 'Duo';
                }),
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        if (!auth()->check()) {
            return redirect()->back()->withErrors(['error' => 'You must be logged in.']);
        }

        $participants = Participants::create([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'contest_type' => $request->contest_type,
            'contest_category' => $request->contest_category,
            'group_team' => in_array(strtolower($request->contest_type), ['group', 'team']) ? $request->group_team : null,
            'duo_name' => strtolower($request->contest_type) === 'Duo' ? $request->duo_name : null,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('users.participants.participants', compact('participants'))
            ->with('success', 'Participant created successfully!');
    }


    public function view()
    {
        $participants = Participants::where('user_id', Auth::id()) // only logged-in user
            ->whereNotNull('contest_type')
            ->whereNotNull('contest_category')
            ->get();

        return view('users.participants.view', compact('participants'), [
            'ActiveTab' => 'view',
            'SubActiveTab' => 'entries review'
        ]);
    }

    public function update(Request $request, $id)
    {
        $participant = Participants::findOrFail($id);

        $participant->student_id = $request->student_id;
        $participant->student_name = $request->student_name;
        $participant->contest_category = $request->contest_category;
        $participant->contest_type = $request->contest_type;

        // Save group/team name only if type is Group or Team
        if (in_array($request->contest_type, ['Group', 'Team'])) {
            $participant->group_team = $request->group_team;
        } else {
            $participant->group_team = null; // clear it if it's not a group/team
        }

        if ($request->contest_type === 'Duo') {
            $participant->duo_name = $request->duo_name;
        } else {
            $participant->duo_name = null;
        }

        $participant->save();

        return redirect()->back()->with('success', 'Participant updated successfully.');
    }

    public function destroy($id)
    {
        $participant = Participants::findOrFail($id);
        $participant->delete();
        return back()->with('success', 'Deleted successfully !!');
    }
}
