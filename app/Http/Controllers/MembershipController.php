<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        return view('membership'); // this refers to resources/views/home.blade.php
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'age' => 'required|integer|min:10|max:100',
        'gender' => 'required|string',
        'current_body_type' => 'required|string',
        'desired_body_type' => 'required|string',
        'weight' => 'required|numeric',
        'target_weight' => 'nullable|numeric',
        'height' => 'required|numeric',
        'workout_time' => 'required|string',
        'medical_history' => 'nullable|string',
        'membership_plan' => 'required|integer',
    ]);

    Membership::create($validated);

    return  redirect()->back()->with('success', 'Membership form submitted successfully!');
}



public function show(Request $request)
{
    $sortDirection = $request->input('sort_direction', 'asc');
    $sortBy = $request->input('sort_by', 'age'); // Default to sorting by age

    if ($sortBy === 'days_left') {
        $members = Membership::selectRaw('*, DATEDIFF(DATE_ADD(created_at, INTERVAL membership_plan MONTH), NOW()) AS days_left')
            ->orderBy('days_left', $sortDirection)
            ->get();
    } elseif ($sortBy === 'created_at') {
        $members = Membership::orderBy('created_at', $sortDirection)->get();
    } else {
        $members = Membership::orderBy($sortBy, $sortDirection)->get();
    }

    return view('members.index', compact('members', 'sortDirection', 'sortBy'));
}



public function detail($member_id)
{
    $member = Membership::findOrFail($member_id);
    return view('members.detail', compact('member'));
}


public function edit($id)
{
    $member = Membership::findOrFail($id);
    return view('members.edit', compact('member'));
}

// Handle update submission
public function update(Request $request, $id)
{
    $member = Membership::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'age' => 'required|integer|min:10|max:100',
        'gender' => 'required|string',
        'current_body_type' => 'required|string',
        'desired_body_type' => 'required|string',
        'weight' => 'required|numeric',
        'target_weight' => 'nullable|numeric',
        'height' => 'required|numeric',
        'workout_time' => 'required|string',
        'medical_history' => 'nullable|string',
        'membership_plan' => 'required|integer',
    ]);

    $member->update($validated);

    return redirect()->route('members.detail', ['member_id' => $member->id])->with('success', 'Member updated successfully!');

}






}
