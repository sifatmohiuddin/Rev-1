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


    <div class="min-h-screen flex items-center justify-center px-4">

      <div class="max-w-3xl w-full p-8 bg-gray-800 rounded-3xl shadow-xl space-y-6">


        <h2 class="text-3xl font-semibold text-center text-white mb-4">Assign Plan to Member</h2>

        <form action="{{ route('pdf.generate') }}" method="POST" class="space-y-6">
    @csrf

    <div class="mb-4">
        <label for="membership_id" class="block text-lg font-semibold text-white">Select Member</label>
        <select name="member_id" id="member_id" required class="w-full p-3 rounded-md bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
    <option value="">-- Select Member --</option>
    @foreach($members as $member)
        <option value="{{ $member->id }}"
            @if(isset($selectedMemberId) && $selectedMemberId == $member->id) selected @endif>
            {{ $member->name }}
        </option>
    @endforeach
</select>

    </div>

        <!-- Diet Plan Section -->
<div class="mb-4" x-data="{
    dietMap: {},
    get dietText() {
        return Object.entries(this.dietMap).map(([time, items]) => {
            return time + '\n' + items.join('\n');
        }).join('\n\n');
    },
    addFood(time, item) {
        if (!this.dietMap[time]) {
            this.dietMap[time] = [];
        }
        if (!this.dietMap[time].includes(item)) {
            this.dietMap[time].push(item);
        }
    }
}">
    <label class="block font-semibold mb-2">Diet Plan</label>

    <!-- Buttons Group -->
    <div x-data="{ openMorning: false, openAfternoon: false, openEvening: false, openDinner: false }" class="space-y-4">
        <div class="grid grid-cols-4 gap-2">

            <!-- Morning -->
            <div>
                <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openMorning = !openMorning">Morning</h4>
                <div x-show="openMorning" x-transition class="flex flex-wrap gap-2 mt-2">
                    <button type="button" @click="addFood('Morning', '2x Eggs')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">2x Eggs</button>
                    <button type="button" @click="addFood('Morning', 'Nuts')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Nuts</button>
                    <button type="button" @click="addFood('Morning', 'Banana')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Banana</button>
                    <button type="button" @click="addFood('Morning', 'Oats')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Oats</button>
                </div>
            </div>

            <!-- Afternoon -->
            <div>
                <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openAfternoon = !openAfternoon">Afternoon</h4>
                <div x-show="openAfternoon" x-transition class="flex flex-wrap gap-2 mt-2">
                    <button type="button" @click="addFood('Afternoon', 'Rice')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Rice</button>
                    <button type="button" @click="addFood('Afternoon', 'Chicken')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Chicken</button>
                    <button type="button" @click="addFood('Afternoon', 'Vegetables')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Vegetables</button>
                    <button type="button" @click="addFood('Afternoon', 'Dal')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Dal</button>
                </div>
            </div>

            <!-- Evening -->
            <div>
                <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openEvening = !openEvening">Evening</h4>
                <div x-show="openEvening" x-transition class="flex flex-wrap gap-2 mt-2">
                    <button type="button" @click="addFood('Evening', 'Fruits')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Fruits</button>
                    <button type="button" @click="addFood('Evening', 'Nuts')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Nuts</button>
                    <button type="button" @click="addFood('Evening', 'Boiled Egg')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Boiled Egg</button>
                    <button type="button" @click="addFood('Evening', 'Smoothie')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Smoothie</button>
                </div>
            </div>

            <!-- Dinner -->
            <div>
                <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openDinner = !openDinner">Dinner</h4>
                <div x-show="openDinner" x-transition class="flex flex-wrap gap-2 mt-2">
                    <button type="button" @click="addFood('Dinner', 'Roti')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Roti</button>
                    <button type="button" @click="addFood('Dinner', 'Grilled Chicken')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Grilled Chicken</button>
                    <button type="button" @click="addFood('Dinner', 'Steamed Veggies')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Steamed Veggies</button>
                    <button type="button" @click="addFood('Dinner', 'Protein Shake')" class="bg-green-500 px-2 py-1 rounded text-white text-sm">Protein Shake</button>
                </div>
            </div>
        </div>
          <button type="button"
    @click="dietMap = {}; workoutMap = {}"
    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
    Reset Plan
</button>

    </div>

    <!-- Output Textarea -->
    <textarea name="diet_plan" x-model="dietText" rows="12" class="w-full mt-4 p-2 border rounded text-gray-900" placeholder="Diet plan..." readonly></textarea>
</div>


       <!-- Workout Plan Section -->
<div class="mb-4" x-data="{
    workoutMap: {},
    get workoutText() {
        return Object.entries(this.workoutMap).map(([group, exercises]) => {
            return group + '\n' + exercises.join('\n');
        }).join('\n\n');
    },
    addExercise(group, exercise) {
        if (!this.workoutMap[group]) {
            this.workoutMap[group] = [];
        }
        if (!this.workoutMap[group].includes(exercise)) {
            this.workoutMap[group].push(exercise);
        }
    }
}">
    <label class="block font-semibold mb-2">Workout Plan</label>

    <!-- Buttons -->
    <div x-data="{ openBack: false, openBiceps: false, openTriceps: false, openChest: false, openLegs: false, openAbs: false, openShoulders: false }" class="space-y-4">
    <div class="grid grid-cols-7 gap-1">

        <!-- Biceps Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openBiceps = !openBiceps">
            Biceps
        </h4>
        <div x-show="openBiceps" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Biceps', 'Biceps Curl 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Biceps Curl 4x10</button>
            <button type="button" @click="addExercise('Biceps', 'Hammer Curl 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Hammer Curl 4x10</button>
            <button type="button" @click="addExercise('Biceps', 'Preacher Curl 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Preacher Curl 4x10</button>
            <button type="button" @click="addExercise('Biceps', 'Narrow Bar 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Narrow Bar 4x10</button>
        </div>
    </div>
    <!-- Triceps Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openTriceps = !openTriceps">
            Triceps
        </h4>
        <div x-show="openTriceps" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Triceps', 'Close-Grip Bench Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Close-Grip Bench Press 4x10</button>
            <button type="button" @click="addExercise('Triceps', 'Triceps Pushdowns 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Triceps Pushdowns 4x12</button>
            <button type="button" @click="addExercise('Triceps', 'Overhead Triceps Extension 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Overhead Triceps Extension 4x10</button>
            <button type="button" @click="addExercise('Triceps', 'Skull Crushers 4x8')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Skull Crushers 4x8</button>
            <button type="button" @click="addExercise('Triceps', 'Dips (Triceps Focused) 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Dips (Triceps Focused) 4x10</button>
            <button type="button" @click="addExercise('Triceps', 'Triceps Kickbacks 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Triceps Kickbacks 4x12</button>
        </div>
    </div>

    <!-- Chest Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openChest = !openChest">
            Chest
        </h4>
        <div x-show="openChest" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Chest', 'Bench Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Bench Press 4x10</button>
            <button type="button" @click="addExercise('Chest', 'Incline Dumbbell Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Incline Dumbbell Press 4x10</button>
            <button type="button" @click="addExercise('Chest', 'Chest Fly 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Chest Fly 4x12</button>
            <button type="button" @click="addExercise('Chest', 'Push-Ups 4x15')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Push-Ups 4x15</button>
            <button type="button" @click="addExercise('Chest', 'Decline Bench Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Decline Bench Press 4x10</button>
        </div>
    </div>

    <!-- Legs Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openLegs = !openLegs">
            Legs
        </h4>
        <div x-show="openLegs" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Legs', 'Squats 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Squats 4x10</button>
            <button type="button" @click="addExercise('Legs', 'Leg Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Leg Press 4x10</button>
            <button type="button" @click="addExercise('Legs', 'Lunges 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Lunges 4x12</button>
            <button type="button" @click="addExercise('Legs', 'Romanian Deadlifts 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Romanian Deadlifts 4x10</button>
            <button type="button" @click="addExercise('Legs', 'Leg Extensions 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Leg Extensions 4x12</button>
        </div>
    </div>

    <!-- Abs Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openAbs = !openAbs">
            Abs
        </h4>
        <div x-show="openAbs" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Abs', 'Crunches 4x20')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Crunches 4x20</button>
            <button type="button" @click="addExercise('Abs', 'Leg Raises 4x15')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Leg Raises 4x15</button>
            <button type="button" @click="addExercise('Abs', 'Plank 3x60s')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Plank 3x60s</button>
            <button type="button" @click="addExercise('Abs', 'Bicycle Crunches 4x20')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Bicycle Crunches 4x20</button>
            <button type="button" @click="addExercise('Abs', 'Russian Twists 4x30s')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Russian Twists 4x30s</button>
        </div>
    </div>

    <!-- Shoulders Group -->
    <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openShoulders = !openShoulders">
            Shoulders
        </h4>
        <div x-show="openShoulders" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Shoulders', 'Overhead Shoulder Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Overhead Shoulder Press 4x10</button>
            <button type="button" @click="addExercise('Shoulders', 'Lateral Raises 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Lateral Raises 4x12</button>
            <button type="button" @click="addExercise('Shoulders', 'Front Raises 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Front Raises 4x12</button>
            <button type="button" @click="addExercise('Shoulders', 'Arnold Press 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Arnold Press 4x10</button>
            <button type="button" @click="addExercise('Shoulders', 'Reverse Fly 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Reverse Fly 4x12</button>
        </div>
    </div>


     <div>
        <h4 class="text-lg font-bold mb-2 cursor-pointer" @click="openBack = !openBack">
            Back
        </h4>
        <div x-show="openBack" x-transition class="flex flex-wrap gap-2 mt-2">
            <button type="button" @click="addExercise('Back', 'Pullups 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Pullups 4x10</button>
            <button type="button" @click="addExercise('Back', 'Dumbell Row 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Dumbell Row 4x12</button>
            <button type="button" @click="addExercise('Back', 'Deadlift 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Deadlift 4x12</button>
            <button type="button" @click="addExercise('Back', 'Cable Row 4x10')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Cable Row 4x10</button>
            <button type="button" @click="addExercise('Back', 'Reverse Fly 4x12')" class="bg-blue-500 px-2 py-1 rounded text-white text-sm">Reverse Fly 4x12</button>
        </div>
    </div>

</div>

<button type="button"
    @click="dietMap = {}; workoutMap = {}"
    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
    Reset Plan
</button>



        <!-- Add more groups similarly if needed -->
    </div>



    <!-- Output Textarea -->
    <textarea name="workout_plan" x-model="workoutText" rows="20" class="w-full mt-4 p-2 border rounded text-gray-900" placeholder="Workout plan..." readonly></textarea>

</div>

{{-- <div class="space-y-2">
  <label class="block text-sm font-medium text-white mb-1">Workout Days</label> --}}

  {{-- <div class="flex items-center space-x-2">
    <input
      type="checkbox"
      name="workout_days"
      value="Day 1: Chest + Triceps Day 2: Back + Biceps Day 3: Legs + Shoulders (repeat)"
      id="workout_days"
      class="form-checkbox"
    >
    <label for="workout_days" class="text-sm text-white">
      Day 1: Chest + Triceps Day 2: Back + Biceps Day 3: Legs + Shoulders (repeat)
    </label>
  </div>
</div> --}}

<div class="space-y-2">
    <label class="block text-sm font-medium text-white mb-1">Workout Days</label>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="workout_days" value="Day 1: Chest + Triceps Day 2: Back + Biceps Day 3: Legs + Shoulders (repeat)" id="workout_days" class="form-checkbox">
        <label for="workout_days" class="text-sm text-white">
            Day 1: Chest + Triceps Day 2: Back + Biceps Day 3: Legs + Shoulders (repeat)
        </label>
    </div>
</div>



        <button type="submit" class="w-64 bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
            Download PDF
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



