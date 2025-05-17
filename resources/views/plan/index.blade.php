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
    <div class="max-w-6xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Assigned Plans</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded border">
            <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
    <tr>
        <th class="p-3">#</th>
        <th class="p-3">Member Name</th>
        <th class="p-3">Diet Plan</th>
        <th class="p-3">Workout Plan</th>
        <th class="p-3">Assigned At</th>
        <th class="p-3">Actions</th> <!-- New Column -->
    </tr>
</thead>
<tbody class="text-sm text-gray-700 divide-y">
    @forelse($plans as $index => $plan)
        <tr>
            <td class="p-3">{{ $index + 1 }}</td>
            <td class="p-3">{{ $plan->membership->name ?? 'N/A' }}</td>
            <td class="p-3">{{ $plan->diet_plan }}</td>
            <td class="p-3">{{ $plan->workout_plan }}</td>
            <td class="p-3">{{ $plan->created_at->format('d M Y') }}</td>
            <td class="p-3">
                <a href="{{ route('plans.edit', $plan->id) }}" class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                    <i class="ri-edit-line mr-1"></i>Edit
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="p-3 text-center text-gray-500">No plans found.</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
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



