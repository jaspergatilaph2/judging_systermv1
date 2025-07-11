<?php

namespace App\Http\Controllers\Admin\criteria;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $groupedTotals = Criteria::selectRaw('contest_category, contest_type, SUM(percentage) as total_percentage')
            ->whereYear('created_at', 2025) // Optional: limit to year 2025
            ->groupBy('contest_category', 'contest_type')
            ->get();
        return view('admin.criteria.criteria', [
            'ActiveTab' => 'criteria',
            'SubActiveTab' => 'Adding Criteria'
        ], compact('groupedTotals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contest_category' => 'required|string',
            'contest_type' => 'required|string',
            'name' => 'required|array|min:1',
            'percentage' => 'required|array|min:1',
            'name.*' => 'required|string',
            'percentage.*' => 'required|numeric|min:1|max:100',
        ]);

        $names = $request->input('name');
        $percentages = $request->input('percentage');

        foreach ($names as $index => $name) {
            Criteria::create([
                'contest_category' => $request->contest_category,
                'contest_type' => $request->contest_type,
                'name' => $name,
                'percentage' => $percentages[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Criteria saved successfully!');
    }

    public function view()
    {
        $criteria = Criteria::paginate(10);
        $groupedTotals = Criteria::selectRaw('contest_category, contest_type, SUM(percentage) as total_percentage')
            ->whereYear('created_at', 2025) // Optional: limit to year 2025
            ->groupBy('contest_category', 'contest_type')
            ->get();
        return view('admin.criteria.view', compact('criteria', 'groupedTotals'),[
            'ActiveTab' => 'view',
            'SubActiveTab' => 'criteria'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:1|max:100',
            'contest_category' => 'required|string|max:255',
            'contest_type' => 'required|string|max:255',
        ]);

        // Find the criterion by ID
        $criteria = Criteria::findOrFail($id);

        // Update the criterion
        $criteria->update([
            'name' => $request->input('name'),
            'percentage' => $request->input('percentage'),
            'contest_category' => $request->input('contest_category'),
            'contest_type' => $request->input('contest_type'),
        ]);

        return redirect()->back()->with('success', 'Criterion updated successfully!');
    }

    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();
        return redirect()->back()->with('success', 'Deleted criteria successfully!!');
    }
}
