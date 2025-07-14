<?php

namespace App\Http\Controllers\Admin\judges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Judges;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Criteria;
use App\Models\Participants;
use App\Models\Scores;

class JudgesController extends Controller
{
    public function create()
    {

        $generatedPassword = Str::random(8);
        return view('admin.judges.create', [
            'ActiveTab' => 'Adding Judge',
            'SubActiveTab' => 'View Judge',
            'generatedPassword' => $generatedPassword
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|unique:judges,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('judges_images', 'public');
        } else {
            $imagePath = null;
        }

        Judges::create([
            'name' => $request->name,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.judges.create')->with('success', 'Judge created successfully.');
    }

    public function viewJudges()
    {
        $judges = Judges::all();
        return view('admin.judges.view', compact('judges'), [
            'ActiveTab' => 'Judges',
            'SubActiveTab' => 'View Judges'
        ]);
    }

    public function edit($id)
    {
        $judge = Judges::findOrFail($id);
        return view('admin.judges.edit', compact('judge'));
    }

    public function destroy($id)
    {
        $judge = Judges::findOrFail($id);
        $judge->delete();
        return redirect()->route('admin.judges.viewjudges')->with('success', 'Judge deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $judge = Judges::findOrFail($id);
        $judge->update($request->all());
        return redirect()->route('admin.judges.viewjudges')->with('success', 'Judge updated successfully.');
    }

    public function dashboard()
    {
        // $judge = Auth::guard('judges')->user(); // ✅ fetch logged-in judge
        $totalParticipants = Participants::count();
        return view('judges.dashboard.dashboard', [
            'ActiveTab' => 'Dashboard',
            'SubActiveTab' => 'Dashboard',
            // 'judge' => $judge,
        ], compact('totalParticipants'));
    }

    public function vote(Request $request)
    {
        $contestCategories = [ // or $categories if you prefer, but use consistently
            "Singing Contest",
            "Dance Contest",
            "Pageant",
            "Quiz Bee",
            "Debate",
            "Mr. & Ms. Contest",
            "Talent Show",
            "Battle of the Bands",
            "Spoken Word / Poetry",
            "Essay Writing",
            "Poster Making",
            "Drawing Contest",
            "Photography Contest",
            "Cosplay Competition",
            "Modeling Contest",
            "Cooking Contest"
        ];

        // Load all participants
        $participants = Participants::all();

        // Get selected participant if set
        $selectedParticipant = null;
        if ($request->filled('participant_id')) {
            $selectedParticipant = Participants::find($request->participant_id);
        }

        // Load criteria if category and type are selected
        $criteria = collect();
        if ($request->filled(['contest_category', 'contest_type'])) {
            $criteria = Criteria::where('contest_category', $request->contest_category)
                ->where('contest_type', $request->contest_type)
                ->get();
        }

        return view('judges.participants.votes', [
            'contestCategories' => $contestCategories,
            'participants' => $participants,
            'criteria' => $criteria,
            'selectedParticipant' => $selectedParticipant, // ✅ pass it here
            'ActiveTab' => 'view',
            'SubActiveTab' => 'judges',
            'selectedCategory' => $request->contest_category,
            'selectedType' => $request->contest_type,
        ]);
    }



    public function storeScore(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'scores' => 'required|array',
            'scores.*' => 'required|numeric|min:0'
        ]);

        // Check if this judge already judged the participant
        $alreadyJudged = Scores::where('judge_id', auth('judges')->id())
            ->where('participant_id', $request->participant_id)
            ->exists();

        if ($alreadyJudged) {
            return redirect()->back()->withErrors(['participant_id' => 'You have already judged this participant.']);
        }

        $totalScore = 0;

        foreach ($request->scores as $criteriaId => $score) {
            Scores::create([
                'judge_id' => auth('judges')->id(),
                'participant_id' => $request->participant_id,
                'criteria_id' => $criteriaId,
                'score' => $score,
            ]);

            $totalScore += $score;
        }

        $totalPossible = Criteria::whereIn('id', array_keys($request->scores))->sum('percentage');
        $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;

        return redirect()->back()->with([
            'success' => 'Scores submitted successfully.',
            'totalScore' => $totalScore,
            'scorePercent' => number_format($percentage, 2),
        ]);
    }

    public function showScoreForm(Request $request)
    {
        $contestCategories = Participants::distinct()->pluck('contest_category');

        $participants = collect();
        $selectedParticipant = null;
        $criteria = collect();

        if ($request->filled('contest_category')) {
            $participants = Participants::where('contest_category', $request->contest_category)->get();
        }

        if ($request->filled('participant_id')) {
            $selectedParticipant = Participants::find($request->participant_id);

            if ($selectedParticipant) {
                $criteria = Criteria::where('contest_category', $selectedParticipant->contest_category)
                    ->where('contest_type', $selectedParticipant->contest_type)
                    ->get();
            }
        }

        // ✅ PASS all variables here, including $contestCategories
        return view('judges.participants.votes', [
            'contestCategories' => $contestCategories,
            'participants' => $participants,
            'selectedParticipant' => $selectedParticipant,
            'criteria' => $criteria,
            'ActiveTab' => 'view',
            'SubActiveTab' => 'judges',
            'selectedCategory' => $request->contest_category,
            'selectedType' => $request->contest_type,
        ]);
    }
}
