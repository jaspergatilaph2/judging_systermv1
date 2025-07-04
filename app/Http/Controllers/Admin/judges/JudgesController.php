<?php

namespace App\Http\Controllers\Admin\judges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Judges;
use Illuminate\Support\Str;

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
}
