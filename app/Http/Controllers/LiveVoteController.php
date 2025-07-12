<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LiveVoteController extends Controller
{

    public function vote()
    {
        // Get total number of votes (score entries)
        $totalVotes = DB::table('scores')->count();

        // Join scores with criteria to apply percentage weight
        $weightedScores = DB::table('scores')
            ->join('criteria', 'scores.criteria_id', '=', 'criteria.id')
            ->select(
                'scores.participant_id',
                DB::raw('SUM(scores.score * (criteria.percentage / 100)) as weighted_score')
            )
            ->groupBy('scores.participant_id')
            ->pluck('weighted_score', 'participant_id'); // [participant_id => weighted_score]

        // Get participants who have scores
        $participants = DB::table('participants')
            ->whereIn('id', $weightedScores->keys())
            ->get();

        $votePercentages = [];

        foreach ($participants as $participant) {
            $weightedScore = $weightedScores[$participant->id] ?? 0;

            $votePercentages[] = [
                'id' => $participant->id,
                'student_name' => $participant->student_name,
                'contest_type' => $participant->contest_type,
                'contest_category' => $participant->contest_category,
                'score' => round($weightedScore, 2),
                'percentage' => round($weightedScore, 2),
            ];
        }

        return view('live.vote', compact('votePercentages', 'totalVotes'));
    }
}
