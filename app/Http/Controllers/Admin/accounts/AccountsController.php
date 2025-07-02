<?php

namespace App\Http\Controllers\Admin\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountsController extends Controller
{
    public function accounts()
    {
        $user = auth()->user();
        return view('admin.accounts.profile', compact('user'), [
            'ActiveTab' => 'accounts',
            'SubActiveTab' => 'TabAccounts'
        ]);
    }

    public function editAccounts()
    {
        $user = auth()->user();
        return view('admin.accounts.editProfile', compact('user'), [
            'ActiveTab' => 'accounts',
            'SubActiveTab' => 'TabAccounts'
        ]);
    }

    public function updateAccounts(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
