<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Membership;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'diet_plan' => 'required|string',
            'workout_plan' => 'required|string',
        ]);

        Plan::create($request->all());

        return redirect()->back()->with('success', 'Plan assigned successfully!');
    }


    public function create(Request $request)
    {
        $memberId = $request->query('member_id'); // Grab the member ID from the URL
        $memberships = Membership::all();

        return view('plan.create', compact('memberships', 'memberId'));
    }


}
