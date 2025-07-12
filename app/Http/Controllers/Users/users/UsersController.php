<?php

namespace App\Http\Controllers\Users\users;

use App\Http\Controllers\Controller;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display the user's dashboard.
     */
    public function dashboard()
    {
        $participants = Participants::where('user_id', Auth::id())->get() // Filter by the logged-in user
            ->whereNotNull('contest_type')
            ->whereNotNull('contest_category')
            ->map(function ($participant) {
                // If it's a Group/Team and group_team is empty, set it to 'N/A'
                if (in_array($participant->contest_type, ['Group', 'Team']) && empty($participant->group_team)) {
                    $participant->group_team = 'N/A';
                } elseif (!in_array($participant->contest_type, ['Group', 'Team'])) {
                    $participant->group_team = 'N/A'; // Not applicable
                }

                return $participant;
            });

        return view('users.dashboard.dashboard', compact('participants'));
    }

    /**
     * Show the authenticated user's account overview.
     */
    public function userAccounts()
    {
        $user = Auth::guard('web')->user();

        return view('users.accounts.userAccounts', compact('user'), [
            'ActiveTab' => 'accounts',
            'SubActiveTab' => 'UserAccounts',
        ]);
    }

    /**
     * Show the profile edit form for the authenticated user.
     */
    public function editProfile()
    {
        $user = Auth::guard('web')->user();

        return view('users.accounts.updateAccounts', compact('user'), [
            'ActiveTab' => 'accounts',
            'SubActiveTab' => 'updateProfile',
        ]);
    }

    /**
     * Update the authenticated user's profile.
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update basic info
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('users.accounts.editProfile')->with('success', 'Profile updated successfully.');
    }
}
