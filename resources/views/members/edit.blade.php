<!DOCTYPE html>
<html lang="en" class="h-full">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Edit Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>

  <body class="h-full min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">

    <div class="min-h-screen flex items-center justify-center px-2 py-8">
      <div class="w-full max-w-3xl bg-gray-800 rounded-2xl shadow-md px-6 py-6 space-y-4">

        <h2 class="text-xl font-semibold text-center">Edit Member</h2>

        <form method="POST" action="{{ route('members.update', $member->id) }}" class="space-y-4">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
              <label for="name" class="block mb-1">Name</label>
              <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="phone" class="block mb-1">Phone</label>
              <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="age" class="block mb-1">Age</label>
              <input type="number" name="age" id="age" value="{{ old('age', $member->age) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="gender" class="block mb-1">Gender</label>
              <input type="text" name="gender" id="gender" value="{{ old('gender', $member->gender) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="current_body_type" class="block mb-1">Current Body Type</label>
              <input type="text" name="current_body_type" id="current_body_type" value="{{ old('current_body_type', $member->current_body_type) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="desired_body_type" class="block mb-1">Desired Body Type</label>
              <input type="text" name="desired_body_type" id="desired_body_type" value="{{ old('desired_body_type', $member->desired_body_type) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="weight" class="block mb-1">Weight (kg)</label>
              <input type="number" name="weight" id="weight" value="{{ old('weight', $member->weight) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="target_weight" class="block mb-1">Target Weight (kg)</label>
              <input type="number" name="target_weight" id="target_weight" value="{{ old('target_weight', $member->target_weight) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none">
            </div>

            <div>
              <label for="height" class="block mb-1">Height (cm)</label>
              <input type="number" name="height" id="height" value="{{ old('height', $member->height) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
              <label for="workout_time" class="block mb-1">Workout Time</label>
              <input type="text" name="workout_time" id="workout_time" value="{{ old('workout_time', $member->workout_time) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div class="md:col-span-2">
              <label for="medical_history" class="block mb-1">Medical History</label>
              <textarea name="medical_history" id="medical_history" rows="2" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none">{{ old('medical_history', $member->medical_history) }}</textarea>
            </div>

            <div class="md:col-span-2">
              <label for="membership_plan" class="block mb-1">Membership Plan (months)</label>
              <input type="number" name="membership_plan" id="membership_plan" value="{{ old('membership_plan', $member->membership_plan) }}" class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-none" required>
            </div>
          </div>

          <div class="flex flex-col items-center space-y-3 pt-2">
            <button type="submit" class="w-48 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 text-sm">
              Update Member
            </button>

            <a href="{{ route('members.show') }}"
              class="text-indigo-400 hover:text-white text-sm underline">
              <i class="ri-arrow-left-line mr-1"></i> Back to Members
            </a>
          </div>
        </form>

      </div>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
