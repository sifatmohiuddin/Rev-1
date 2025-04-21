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
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">


    <div class="min-h-screen flex items-center justify-center px-4">

      <div class="max-w-3xl w-full p-8 bg-gray-800 rounded-3xl shadow-xl space-y-6">




        <h2 class="text-3xl font-semibold text-center text-white mb-4">Assign Plan to Member</h2>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
          {{ session('success') }}
        </div>
        @endif

    <form action="{{ route('plans.store') }}" method="POST" class="space-y-6">
      @csrf

      <!-- Select Member -->
      <div class="mb-4">
        <label for="membership_id" class="block text-lg font-semibold text-white">Select Member</label>
        <select name="membership_id" id="membership_id" class="w-full p-3 rounded-md bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
          @foreach($memberships as $member)
          <option value="{{ $member->id }}" @if($member->id == $memberId) selected @endif>
            {{ $member->name }} (ID: {{ $member->id }})
          </option>
          @endforeach
        </select>
      </div>

      <!-- Select Diet Plan -->
      <div class="mb-4">
        <label for="diet_plan" class="block text-lg font-semibold text-white">Diet Plan</label>
        <select name="diet_plan" id="diet_plan" class="w-full p-3 rounded-md bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <option value="Keto">Keto</option>
          <option value="Vegan">Vegan</option>
          <option value="High Protein">High Protein</option>
          <option value="Balanced">Balanced</option>
          <option value="Custom">Custom</option>
        </select>
      </div>

      <!-- Select Workout Plan -->
      <div class="mb-6">
        <label for="workout_plan" class="block text-lg font-semibold text-white">Workout Plan</label>
        <select name="workout_plan" id="workout_plan" class="w-full p-3 rounded-md bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <option value="Beginner">Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
          <option value="Cardio Focused">Cardio Focused</option>
          <option value="Custom">Custom</option>
        </select>
      </div>

      <!-- Submit Button -->
      <div class="flex flex-col items-center space-y-4 pt-4">
        <button type="submit" class="w-64 bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
            Assign Plan
        </button>

        <a href="{{ route('members.show') }}"
           class="w-64 text-center inline-flex items-center justify-center px-4 py-2 text-indigo-400 hover:text-white border border-indigo-400 hover:bg-indigo-600 rounded-md text-sm transition-all">
            <i class="ri-arrow-left-line mr-2"></i> Back to Members
        </a>
    </div>




    </form>
  </div>


</body>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="main.js"></script>


</html>
