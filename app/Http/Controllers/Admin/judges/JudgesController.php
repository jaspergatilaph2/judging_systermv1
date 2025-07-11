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

        return view('judges.dashboard.dashboard', [
            'ActiveTab' => 'Dashboard',
            'SubActiveTab' => 'Dashboard',
            // 'judge' => $judge,
        ]);
    }

    public function vote()
    {
        $participants = Participants::all();
        $criteria = Criteria::all();
        return view('judges.participants.votes', compact('participants', 'criteria'), [
            'ActiveTab' => 'view',
            'SubActiveTab' => 'judges'
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
        $alreadyJudged = Scores::where('judge_id', auth()->id())
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
}
