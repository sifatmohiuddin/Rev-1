<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <title>Web Design Mastery | REV-1</title>
  <script src="https://cdn.tailwindcss.com"></script>

  @vite('resources/js/app.js')

</head>

<body class="h-full min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">







<div class="min-h-screen flex items-center justify-center bg-gray-950 text-white px-4">
    <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 p-8 rounded-2xl shadow-2xl max-w-2xl w-full border border-gray-700">
        <h2 class="text-2xl font-bold mb-6">Edit Assigned Plan</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('plans.update', $plan->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-300">Member Name</label>
                <input type="text" value="{{ $plan->membership->name ?? 'N/A' }}" disabled class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-300">Diet Plan</label>
                <input type="text" name="diet_plan" value="{{ old('diet_plan', $plan->diet_plan) }}" class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-300">Workout Plan</label>
                <input type="text" name="workout_plan" value="{{ old('workout_plan', $plan->workout_plan) }}" class="w-full bg-gray-800 text-white border border-gray-600 rounded p-2">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('plans.index') }}" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Back</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Update Plan</button>
            </div>
        </form>
    </div>
</div>








</body>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="main.js"></script>


</html>



