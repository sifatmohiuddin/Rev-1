

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Web Design Mastery | REV-1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>



  <body class="bg-gray-900 text-white p-8">


        <div class="max-w-xl mx-auto mt-10 shadow p-6 rounded-xl ">
            <h2 class="text-2xl font-bold mb-4">Assign Plan to Member</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('plans.store') }}" method="POST">
                @csrf

                <div class="mb-4" >
                    <label for="membership_id" class="block font-semibold">Select Member</label>
                    <select name="membership_id" id="membership_id" class="w-full p-2 border rounded text-gray-900">
                        @foreach($memberships as $member)
                            <option value="{{ $member->id }}">{{ $member->name }} (ID: {{ $member->id }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="diet_plan" class="block font-semibold">Diet Plan</label>
                    <select name="diet_plan" id="diet_plan" class="w-full p-2 border rounded text-gray-900">
                        <option value="Keto">Keto</option>
                        <option value="Vegan">Vegan</option>
                        <option value="High Protein">High Protein</option>
                        <option value="Balanced">Balanced</option>
                        <option value="Custom">Custom</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="workout_plan" class="block font-semibold">Workout Plan</label>
                    <select name="workout_plan" id="workout_plan" class="w-full p-2 border rounded text-gray-900">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Cardio Focused">Cardio Focused</option>
                        <option value="Custom">Custom</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Assign Plan
                </button>
            </form>
        </div>







    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>

