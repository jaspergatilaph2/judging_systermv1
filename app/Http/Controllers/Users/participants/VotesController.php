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

        Votes::create([
            'user_id'          => auth()->id(),
            'contestant_id'    => $request->contestant_id,
            'contest_category' => $request->contest_category,
        ]);

        return back()->with('success', 'Your vote has been recorded!');
    }
}
