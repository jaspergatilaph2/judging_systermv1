<?php

namespace App\Http\Controllers\Admin\judges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Judges;

class JudgesController extends Controller
{
    public function create()
    {
        return view('admin.judges.create',[
            'ActiveTab' => 'Adding Judge',
            'SubActiveTab'=> 'View Judge'
        ]);
    }

    public function store(Request $request)
    {
        // Validate and store the judge data
        $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|unique:judges,email',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('judges_images', 'public');
        } else {
            $imagePath = null;
        }

        // Store the judge data in the database
        Judges::create([
            'name' => $request->name,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.judges.create')->with('success', 'Judge created successfully.');
    }
}
