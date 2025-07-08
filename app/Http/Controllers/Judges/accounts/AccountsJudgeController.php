<?php

namespace App\Http\Controllers\Judges\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsJudgeController extends Controller
{
    public function AccountsIndex()
    {
        $user = Auth::guard('judges')->user(); // or however you retrieve the judge
        return view('judges.accounts.accounts', compact('user'), [
            'AccountsTab' => 'accounts',
            'SubActiveTab' => 'View Accounts'
        ]);
    }
}
