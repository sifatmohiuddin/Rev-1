<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Member Details</title>
  </head>

  <body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-3xl bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-2xl shadow-2xl p-8 space-y-6 border border-gray-700">

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
          {{ session('success') }}
        </div>
        @endif

      <div class="text-center">
        <h1 class="text-3xl font-bold text-white mb-1">{{ $member->name }}'s Profile</h1>
        <p class="text-sm text-gray-400">Detailed member information</p>
      </div>

      @php
        $endDate = $member->updated_at->copy()->addMonths($member->membership_plan);
        $daysLeft = now()->diffInDays($endDate, false);

        if ($daysLeft < 0) {
            $daysLeftText = abs($daysLeft) . ' days (Expired)';
            $daysLeftClass = 'text-red-500';
        } elseif ($daysLeft <= 10) {
            $daysLeftText = $daysLeft . ' days left';
            $daysLeftClass = 'text-yellow-400';
        } else {
            $daysLeftText = $daysLeft . ' days left';
            $daysLeftClass = 'text-green-400';
        }
      @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm items-center justify-between">
        <div><span class="text-gray-400">ID:</span> {{ $member->id }}</div>
        <div><span class="text-gray-400">Phone:</span> {{ $member->phone }}</div>
        <div><span class="text-gray-400">Age:</span> {{ $member->age }}</div>
        <div><span class="text-gray-400">Gender:</span> {{ ucfirst($member->gender) }}</div>
        <div><span class="text-gray-400">Current Body:</span> {{ $member->current_body_type }}</div>
        <div><span class="text-gray-400">Desired Body:</span> {{ $member->desired_body_type }}</div>
        <div><span class="text-gray-400">Weight:</span> {{ $member->weight }} kg</div>
        <div><span class="text-gray-400">Target Weight:</span> {{ $member->target_weight ?? 'N/A' }} kg</div>
        <div><span class="text-gray-400">Height:</span> {{ $member->height }} cm</div>
        <div><span class="text-gray-400">Workout Time:</span> {{ $member->workout_time }}</div>
        <div><span class="text-gray-400">Medical History:</span> {{ $member->medical_history ?? 'None' }}</div>
        <div><span class="text-gray-400">Membership Plan:</span> {{ $member->membership_plan }} month(s)</div>
        <div><span class="text-gray-400">Joined:</span> {{ $member->created_at->format('Y-m-d') }}</div>
        <div><span class="text-gray-400">Days Left:</span> <span class="font-medium {{ $daysLeftClass }}">{{ $daysLeftText }}</span></div>
      </div>

      <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6">
        <a href="{{ route('members.show') }}" class="inline-flex items-center justify-center px-4 py-2 text-indigo-400 hover:text-white border border-indigo-400 hover:bg-indigo-600 rounded-md text-sm transition-all">
          <i class="ri-arrow-left-line mr-2"></i> Back to Members
        </a>

        <a href="{{ route('members.edit', $member->id) }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm transition-all">
          <i class="ri-edit-line mr-2"></i> Edit Info
        </a>

        <a href="{{ route('plans.create', ['member_id' => $member->id]) }}" class="inline-flex items-center justify-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md text-sm transition-all">
          <i class="ri-check-line mr-2"></i> Assign Plan
        </a>
      </div>
    </div>
  </body>
</html>
