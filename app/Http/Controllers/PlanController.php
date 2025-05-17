<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Membership;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function index()
{
    $plans = Plan::with('membership')->latest()->get(); // Assuming 'membership' relation exists in Plan model
    return view('plan.index', compact('plans'));
}


public function show($id)
{
    $member = Membership::with('plan')->findOrFail($id); // Will load the plan along with the membership

    return view('plan.show', compact('member'));
}

public function edit($id)
{
    $plan = Plan::findOrFail($id);
    $memberships = Membership::all(); // in case you want to allow changing the member
    return view('plan.edit', compact('plan', 'memberships'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'diet_plan' => 'required|string',
        'workout_plan' => 'required|string',
    ]);

    $plan = Plan::findOrFail($id);
    $plan->diet_plan = $request->diet_plan;
    $plan->workout_plan = $request->workout_plan;
    $plan->save();

    return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
}

public function downloadPDF($membership_id)
{
    $member = Membership::with('plan')->findOrFail($membership_id);

    if (!$member->plan) {
        return redirect()->back()->with('error', 'No plan found for this member.');
    }

    $data = [
        'gymName' => config('REV-1 GYM & FITNESS'), // Or use a Gym model if you have one
        'phone' => '+88-01767-886375',                 // Replace with dynamic if available
        'address' => '2nd floor, Jumairah center, Muradpur',  // Replace with dynamic if needed
        'member_name' => $member->name,
        'date' => now()->format('F j, Y'),
        'workout_plan' => $member->plan->workout_plan,
        'diet_plan' => $member->plan->diet_plan,
    ];

    $pdf = Pdf::loadView('pdf.plan', $data)->setPaper('a4', 'portrait');

    return $pdf->download('Plan_for_' . str_replace(' ', '_', $data['member_name']) . '.pdf');
}



public function showForm(Request $request)
{
    $members = Membership::all();
    $selectedMemberId = $request->query('member_id'); // get from URL

    return view('pdf.form', compact('members', 'selectedMemberId'));
}




public function generatePDF(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:memberships,id',
        'diet_plan' => 'required|string',
        'workout_plan' => 'required|string',
        'workout_days' => 'nullable|string',
    ]);

    $member = Membership::findOrFail($request->member_id);

    $workoutDays = $request->input('workout_days', '');

    $data = [
        'gymName' => 'REV-1 GYM & FITNESS',
        'phone' => '+88-01767-886375',
        'address' => '2nd floor, Jumairah center, Muradpur',
        'member_name' => $member->name,
        'age' => $member->age ?? 'N/A',
        'weight' => $member->weight ?? 'N/A',
        'date' => now()->format('F j, Y'),
        'diet_plan' => $request->diet_plan,
        'workout_plan' => $request->workout_plan,
        'workout_days' => $workoutDays,
    ];

    $pdf = Pdf::loadView('pdf.plan', $data)->setPaper('a4', 'portrait');

    return $pdf->download('Plan_for_' . str_replace(' ', '_', $data['member_name']) . '.pdf');
}


}
