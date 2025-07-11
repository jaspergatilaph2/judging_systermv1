<?php

namespace App\Http\Controllers\Admin\criteria;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;
class CriteriaController extends Controller
{
    public function index()
    {
        return view('admin.criteria.criteria', [
            'ActiveTab' => 'criteria',
            'SubActiveTab' => 'Adding Criteria'
        ]);
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
}
