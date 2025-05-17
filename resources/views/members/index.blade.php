<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <title>Web Design Mastery | REV-1</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">
  <div class="min-h-screen text-white bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-2xl shadow-2xl p-8 space-y-6 border border-gray-700">

    <!-- Desktop Table -->
    <div class="hidden md:block">
      <h1 class="text-3xl font-bold mb-6 text-center">Registered Members</h1>

      <div class="mb-4">
        <input type="text" id="searchInput" class="w-full px-4 py-2 text-sm bg-gray-800 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Search members by name...">
      </div>

      <div class="overflow-auto rounded-xl shadow-lg border border-gray-700">
        <table class="min-w-full bg-gray-800" id="memberTable">
          <thead>
            <tr class="text-left border-b border-gray-600">
              <th class="py-3 px-4">#</th>
              <th class="py-3 px-4">Id</th>
              <th class="py-3 px-4">Name</th>
              <th class="py-3 px-4">Phone</th>
              <th class="py-3 px-4">
                <a href="{{ route('members.show', ['sort_direction' => $sortDirection === 'asc' ? 'desc' : 'asc', 'sort_by' => 'age']) }}" class="flex items-center">
                  Age
                  @if($sortDirection === 'asc' && $sortBy === 'age')
                    <i class="fas fa-sort-up ml-2"></i>
                  @elseif($sortDirection === 'desc' && $sortBy === 'age')
                    <i class="fas fa-sort-down ml-2"></i>
                  @endif
                </a>
              </th>
              <th class="py-3 px-4">
                <a href="{{ route('members.show', ['sort_direction' => $sortDirection === 'asc' && $sortBy === 'created_at' ? 'desc' : 'asc', 'sort_by' => 'created_at']) }}" class="flex items-center">
                  Created
                  @if($sortDirection === 'asc' && $sortBy === 'created_at')
                    <i class="fas fa-sort-up ml-2"></i>
                  @elseif($sortDirection === 'desc' && $sortBy === 'created_at')
                    <i class="fas fa-sort-down ml-2"></i>
                  @endif
                </a>
              </th>
              <th class="py-3 px-4">
                <a href="{{ route('members.show', ['sort_direction' => $sortDirection === 'asc' ? 'desc' : 'asc', 'sort_by' => 'days_left']) }}" class="flex items-center">
                  Days Left
                  @if($sortDirection === 'asc' && $sortBy === 'days_left')
                    <i class="fas fa-sort-up ml-2"></i>
                  @elseif($sortDirection === 'desc' && $sortBy === 'days_left')
                    <i class="fas fa-sort-down ml-2"></i>
                  @endif
                </a>
              </th>
              <th class="py-3 px-4">View</th>
              <th class="py-3 px-4">Update</th>
              <th class="py-3 px-4">Assign Plan</th>
              <th class="py-3 px-4">Manage</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($members as $index => $member)
              @php
                $startDate = $member->membership_start_date ?? $member->created_at;
                $endDate = \Carbon\Carbon::parse($startDate)->addMonths($member->membership_plan);
                $daysLeft = now()->diffInDays($endDate, false);

                if ($daysLeft < 0) {
                    $daysLeftText = $daysLeft . ' days (Expired)';
                    $daysLeftClass = 'text-red-500';
                } elseif ($daysLeft <= 10) {
                    $daysLeftText = $daysLeft . ' days left';
                    $daysLeftClass = 'text-red-400';
                } else {
                    $daysLeftText = $daysLeft . ' days left';
                    $daysLeftClass = 'text-green-400';
                }
              @endphp
              <tr class="border-t border-gray-700 hover:bg-gray-700 transition member-row">
                <td class="py-3 px-4">{{ $index + 1 }}</td>
                <td class="py-3 px-4">{{ $member->id }}</td>
                <td class="py-3 px-4">{{ $member->name }}</td>
                <td class="py-3 px-4">{{ $member->phone }}</td>
                <td class="py-3 px-4">{{ $member->age }}</td>
                <td class="py-3 px-4">{{ $member->created_at }}</td>
                <td class="py-3 px-4">
                  <span class="font-semibold {{ $daysLeftClass }}">
                    {{ $daysLeftText }}
                  </span>
                </td>
                <td class="py-3 px-4">
                  <a href="{{ route('members.detail', ['member_id' => $member->id]) }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                    <i class="ri-eye-line mr-2"></i> View
                  </a>
                </td>
                <td>
                  <a href="{{ route('members.edit', $member->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                    <i class="ri-edit-line mr-2"></i> Update
                  </a>
                </td>
                <td class="py-3 px-4">
                  <a href="{{ route('plans.create', ['member_id' => $member->id]) }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                    <i class="ri-check-line mr-2"></i> Assign
                  </a>
                </td>

                <!-- Manage Dropdown -->
                <td class="py-3 px-4 relative" x-data="{ open: false }">
                  <button @click="open = !open" class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                    <i class="ri-settings-3-line mr-1"></i> Manage
                  </button>
                  <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-56 bg-gray-800 border border-gray-700 rounded-xl shadow-lg z-50">
                    @foreach ([1, 3, 6] as $months)
                      <form method="POST" action="{{ route('members.resetMembership', $member->id) }}">
                        @csrf
                        <input type="hidden" name="months" value="{{ $months }}">
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-700 text-white">
                          Reset & Add {{ $months }} Month{{ $months > 1 ? 's' : '' }}
                        </button>
                      </form>
                    @endforeach
                  </div>
                </td>
                <td><a href="{{ route('pdf.form', ['member_id' => $member->id]) }}"
   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
    <i class="ri-check-line mr-2"></i> Assign
</a></td>
              </tr>
            @empty
              <tr>
                <td colspan="12" class="text-center py-4 text-gray-400">No members found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Searchable Mobile Cards -->
    <div class="space-y-4 md:hidden">
      <h1 class="text-3xl font-bold mb-6 text-center">Registered Members</h1>
      @forelse ($members as $index => $member)
        @php
          $endDate = $member->created_at->copy()->addMonths($member->membership_plan);
          $daysLeft = now()->diffInDays($endDate, false);

          if ($daysLeft < 0) {
              $daysLeftText = $daysLeft . ' days (Expired)';
              $daysLeftClass = 'text-red-500';
          } elseif ($daysLeft <= 10) {
              $daysLeftText = $daysLeft . ' days left';
              $daysLeftClass = 'text-red-400';
          } else {
              $daysLeftText = $daysLeft . ' days left';
              $daysLeftClass = 'text-green-400';
          }
        @endphp
        <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 border border-gray-700 rounded-xl shadow p-3 space-y-4 text-sm">
          <div class="flex justify-between items-center">
            <h2 class="text-lg font-bold">{{ $member->name }}</h2>
            <span class="font-semibold {{ $daysLeftClass }}">{{ $daysLeftText }}</span>
          </div>
          <div><span class="text-gray-400">Phone:</span> {{ $member->phone }}</div>
          <div><span class="text-gray-400">Age:</span> {{ $member->age }}</div>
          <div class="flex flex-wrap gap-2">
            <a href="{{ route('members.edit', $member->id) }}" class="px-3 py-2 bg-indigo-600 hover:bg-indigo-700 rounded text-white text-sm"><i class="ri-edit-line mr-1"></i>Update</a>
            <a href="{{ route('members.detail', ['member_id' => $member->id]) }}" class="px-3 py-2 bg-red-600 hover:bg-red-700 rounded text-white text-sm"><i class="ri-eye-line mr-1"></i>View</a>
            <a href="{{ route('plans.create', ['member_id' => $member->id]) }}" class="px-3 py-2 bg-green-600 hover:bg-green-700 rounded text-white text-sm"><i class="ri-check-line mr-1"></i>Assign</a>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-400">No members found.</p>
      @endforelse
    </div>

  </div>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    document.getElementById("searchInput").addEventListener("input", function(event) {
      const searchTerm = event.target.value.toLowerCase();
      const rows = document.querySelectorAll(".member-row");

      rows.forEach(row => {
        const name = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
        const phone = row.querySelector("td:nth-child(4)").textContent.toLowerCase();
        row.style.display = (name.includes(searchTerm) || phone.includes(searchTerm)) ? "" : "none";
      });
    });
  </script>
</body>
</html>
