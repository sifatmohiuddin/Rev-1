<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900 text-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign Plan | Member Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-5xl bg-gray-800 rounded-xl shadow-2xl p-6 space-y-8">

        <h2 class="text-3xl font-bold text-center text-blue-400">Assign Plan to Member</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md shadow-md text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('plans.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Member Info -->
            <div class="grid sm:grid-cols-2 gap-4 bg-gray-700 p-4 rounded-lg shadow-inner">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-1">Select Member</label>
                    <select name="membership_id" id="membership_id" class="w-full bg-gray-600 text-white p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                        @foreach($memberships as $member)
                            <option value="{{ $member->id }}" @if($member->id == $memberId) selected @endif>
                                {{ $member->name }} (ID: {{ $member->id }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Diet Plan Section -->
            <div x-data="dietHandler()" class="bg-gray-700 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Diet Plan</h3>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <template x-for="(group, label) in dietGroups" :key="label">
                        <div>
                            <h4 class="text-md font-semibold text-blue-300 cursor-pointer" @click="group.open = !group.open">
                                <span x-text="label"></span>
                            </h4>
                            <div x-show="group.open" x-transition class="mt-2 flex flex-wrap gap-2">
                                <template x-for="item in group.items">
                                    <button type="button" @click="addFood(label, item)"
                                        class="bg-green-500 text-white text-xs px-3 py-1 rounded hover:bg-green-600 transition">
                                        <span x-text="item"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <textarea name="diet_plan" x-model="dietText"
                    class="w-full mt-6 p-3 bg-gray-900 text-gray-200 rounded-md border border-gray-600 text-sm" rows="10"
                    readonly></textarea>
            </div>

            <!-- Workout Plan Section -->
            <div x-data="workoutHandler()" class="bg-gray-700 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Workout Plan</h3>

                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-4">
                    <template x-for="(group, label) in workoutGroups" :key="label">
                        <div>
                            <h4 class="text-md font-semibold text-purple-300 cursor-pointer" @click="group.open = !group.open">
                                <span x-text="label"></span>
                            </h4>
                            <div x-show="group.open" x-transition class="mt-2 flex flex-wrap gap-2">
                                <template x-for="item in group.exercises">
                                    <button type="button" @click="addExercise(label, item)"
                                        class="bg-blue-500 text-white text-xs px-3 py-1 rounded hover:bg-blue-600 transition">
                                        <span x-text="item"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <textarea name="workout_plan" x-model="workoutText"
                    class="w-full mt-6 p-3 bg-gray-900 text-gray-200 rounded-md border border-gray-600 text-sm" rows="12"
                    readonly></textarea>
            </div>

            <!-- Reset + Submit Buttons -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-6">
                <button type="button" @click="resetAll()"
                    class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded transition">
                    Reset Plan
                </button>

                <button type="submit"
                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                    Assign Plan
                </button>
            </div>

            <div class="text-center pt-4">
                <a href="{{ route('members.show') }}"
                   class="inline-block text-indigo-400 hover:text-white transition text-sm">
                    <i class="ri-arrow-left-line"></i> Back to Members
                </a>
            </div>
        </form>
    </div>

    <!-- Alpine Handlers -->
    <script>
        function dietHandler() {
            return {
                dietMap: {},
                dietGroups: {
    Morning: {
        open: false,
        items: [
            '4x Egg Whites + 1 Whole Egg',
            'Oats with Water and Chia Seeds',
            'Green Banana (Boiled)',
            'Suji with Skim Milk (No Sugar)',
            'Chira (Flattened Rice) + Cucumber + Boiled Egg',
            'Black Coffee',
            'Green Tea',
            'Low-fat Yogurt with Nuts',
            'Boiled Sweet Potato',
            'Apple or Guava'
        ]
    },
    Afternoon: {
        open: false,
        items: [
            'Brown Rice or Red Rice (1 Cup)',
            'Grilled Chicken Breast (150g)',
            'Masoor Dal (Less Oil)',
            'Steamed Broccoli or Spinach',
            'Boiled Mixed Vegetables',
            'Fish (Tilapia/Rohu - Grilled/Boiled)',
            'Cucumber-Carrot Salad (No Dressing)',
            '1 tsp Olive Oil on Salad',
            'Papaya (as dessert)',
            'Lemon Water'
        ]
    },
    Evening: {
        open: false,
        items: [
            'Mixed Fruits (Apple, Orange, Guava)',
            'Boiled Chickpeas with Lemon',
            'Handful of Nuts (Almonds/Walnuts)',
            'Low-fat Yogurt with Honey (1 tsp max)',
            'Boiled Egg Whites',
            'Lassi (Salted, No Sugar)',
            'Chana with Cucumber',
            'Green Tea',
            'Protein Shake (if available)',
            'Roasted Soybeans'
        ]
    },
    Dinner: {
        open: false,
        items: [
            '2x Whole Wheat Roti',
            'Grilled Fish or Chicken',
            'Bottle Gourd Curry (Lau, less oil)',
            'Boiled Moong Dal (Yellow Lentil)',
            'Steamed Mixed Veggies',
            'Egg White Omelet with Onion + Capsicum',
            'Cabbage or Cauliflower Bhaji (Dry)',
            'Small Salad (No Mayo)',
            'Clear Vegetable Soup',
            'Low-fat Yogurt'
        ]
    }
}
,
                addFood(time, item) {
                    if (!this.dietMap[time]) this.dietMap[time] = [];
                    if (!this.dietMap[time].includes(item)) this.dietMap[time].push(item);
                },
                get dietText() {
                    return Object.entries(this.dietMap)
                        .map(([key, items]) => `${key.toUpperCase()}\n${items.map(i => '- ' + i).join('\n')}`)
                        .join('\n\n');
                },
                resetAll() {
                    this.dietMap = {};
                }
            };
        }

        function workoutHandler() {
            return {
                workoutMap: {},
                workoutGroups: {
    Biceps: {
        open: false,
        exercises: [
            'Biceps Curl 4x10',
            'Hammer Curl 4x10',
            'Concentration Curl 3x12',
            'Preacher Curl 4x10',
            'Cable Curl 3x15'
        ]
    },
    Triceps: {
        open: false,
        exercises: [
            'Close-Grip Bench Press 4x10',
            'Triceps Pushdown 3x12',
            'Overhead Triceps Extension 3x15',
            'Dips 4x10',
            'Skull Crushers 3x12'
        ]
    },
    Chest: {
        open: false,
        exercises: [
            'Bench Press 4x10',
            'Incline Press 4x10',
            'Decline Press 3x12',
            'Chest Fly (Cable or Dumbbell) 3x15',
            'Push-ups 3x20'
        ]
    },
    Legs: {
        open: false,
        exercises: [
            'Squats 4x10',
            'Leg Press 4x10',
            'Lunges 3x12 (each leg)',
            'Leg Extensions 3x15',
            'Hamstring Curls 3x15',
            'Calf Raises 4x20'
        ]
    },
    Abs: {
        open: false,
        exercises: [
            'Crunches 4x20',
            'Plank 60s',
            'Russian Twists 3x30s',
            'Leg Raises 3x15',
            'Mountain Climbers 3x30s',
            'Bicycle Crunches 3x20'
        ]
    },
    Shoulders: {
        open: false,
        exercises: [
            'Shoulder Press 4x10',
            'Lateral Raises 3x15',
            'Front Raises 3x15',
            'Rear Delt Fly 3x15',
            'Arnold Press 3x12'
        ]
    },
    Back: {
        open: false,
        exercises: [
            'Pullups 4x10',
            'Deadlift 4x8',
            'Lat Pulldown 4x12',
            'Seated Row 3x15',
            'T-Bar Row 3x12',
            'Bent-Over Rows 4x10'
        ]
    }
}
,
                addExercise(group, exercise) {
                    if (!this.workoutMap[group]) this.workoutMap[group] = [];
                    if (!this.workoutMap[group].includes(exercise)) this.workoutMap[group].push(exercise);
                },
                get workoutText() {
                    return Object.entries(this.workoutMap)
                        .map(([key, items]) => `${key}\n${items.join('\n')}`)
                        .join('\n\n');
                },
                resetAll() {
                    this.workoutMap = {};
                }
            };
        }
    </script>
</body>
</html>
