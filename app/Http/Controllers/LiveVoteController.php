<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LiveVoteController extends Controller
{

    public function vote()
    {
        // Count total scores (entries) from scores table
        $totalVotes = DB::table('scores')->count();

        // Fetch all participants
        $participants = DB::table('participants')->get();

        // Sum scores grouped by participant
        $scoresByParticipant = DB::table('scores')
            ->select('participant_id', DB::raw('SUM(score) as total_score'))
            ->groupBy('participant_id')
            ->pluck('total_score', 'participant_id');

        // Calculate percentages
        $votePercentages = [];
        $sumScores = array_sum($scoresByParticipant->toArray());

        foreach ($participants as $participant) {
            $score = $scoresByParticipant[$participant->id] ?? 0;
            $percentage = $sumScores > 0 ? round(($score / $sumScores) * 100) : 0;

            $votePercentages[] = [
                'id' => $participant->id,
                'name' => $participant->student_name,
                'score' => $score,
                'percentage' => $percentage,
            ];
        }

        return view('live.vote', compact('votePercentages', 'totalVotes'));
    }
}
