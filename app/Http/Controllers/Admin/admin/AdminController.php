<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Participants;
use App\Models\Judges;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        $totalParticipants = Participants::count();
        $totalJudges = Judges::count();
        $joinedCategoryCount = Participants::whereNotNull('contest_category')
            ->distinct('contest_category')
            ->count('contest_category');
        $categoryCounts = Participants::select('contest_category')
            ->whereNotNull('contest_category')
            ->groupBy('contest_category')
            ->selectRaw('contest_category, COUNT(*) as total')
            ->get();
        return view('admin.dashboard.index', compact('user', 'totalParticipants', 'totalJudges','joinedCategoryCount','categoryCounts'));
    }

    public function view()
    {
        $participants = Participants::all();
        return view('admin.participants.view', compact('participants'), [
            'ActiveTab' => 'admin',
            'SubActiveTab' => 'participants'
        ]);
    }
}
