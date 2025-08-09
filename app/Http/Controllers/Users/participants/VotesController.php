<?php

namespace App\Http\Controllers\Users\participants;

use App\Http\Controllers\Controller;
use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contest_category' => 'required|string',
            'contestant_id'    => 'required|exists:participants,id',
        ]);

        // Check if the user already voted for this contestant
        $alreadyVoted = Votes::where('user_id', auth()->id())
            ->where('contestant_id', $request->contestant_id)
            ->exists();

        if ($alreadyVoted) {
            return back()->with('error', 'You have already voted for this contestant.');
        }

        // Store the vote
        Votes::create([
            'user_id'          => auth()->id(),
            'contestant_id'    => $request->contestant_id,
            'contest_category' => $request->contest_category,
        ]);

        return back()->with('success', 'Your vote has been recorded!');
    }
}
