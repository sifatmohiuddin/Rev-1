
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

  <body>

    <header>


          <div class="min-h-screen flex items-center justify-center">
            <div class="p-8 rounded-2xl w-full max-w-lg">

              <!-- Breadcrumb here -->
              <nav class="text-white text-sm mb-6" aria-label="Breadcrumb">
                <ol class="list-reset flex items-center space-x-2">
                  <li>
                    <a href="/" class="text-blue-400 hover:underline">Home</a>
                  </li>
                  <li>
                    <span class="mx-2">/</span>
                  </li>
                  <li class="text-gray-300">Membership Form</li>
                </ol>
              </nav>

                <div class=" p-8 rounded-2xl  w-full max-w-lg">
                    <div class="flex justify-center">
                        <a href="#">
                          <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-36 h-auto" />
                        </a>
                      </div>

                    <h2 class="text-2xl font-bold mb-8 text-center text-white">Please complete the following questions to join us!</h2>



                    <form x-data="{
                        step: 1,
                        validateStep() {
                            const currentInput = document.querySelector(`[x-show='step === ${this.step}'] input, [x-show='step === ${this.step}'] select, [x-show='step === ${this.step}'] textarea`);
                            if (currentInput && !currentInput.checkValidity()) {
                                currentInput.reportValidity();
                                return false;
                            }
                            return true;
                        }
                    }"

                    method="POST" action="{{ route('membership.store') }}"  class="space-y-5">
                        @csrf


                        <!-- Step 1: name -->
                        <div x-show="step === 1" x-transition>

                            <div class="text-right mt-4 flex justify-center">
                                <x-go />
                            </div>
                        </div>

                        <!-- Step 1: name -->
                        <div x-show="step === 2" x-transition>
                            <label class="text-white">Full Name</label>
                            <input type="text" name="name" class="w-full p-2 border rounded-xl" placeholder="e.g. ronnie coleman" required>
                            <div class="text-right mt-4">
                                <x-next />
                            </div>
                        </div>


                        <!-- Step 2: Phone -->
                        <div x-show="step === 3" x-transition>
                            <label class="text-white">Phone Number</label>
                            <input type="tel" name="phone" class="w-full p-2 border rounded-xl" placeholder="e.g. 0771234567" required>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 2: Age -->
                        <div x-show="step === 4" x-transition>
                            <label class="text-white">Age</label>
                            <input type="number" name="age" class="w-full p-2 border rounded-xl" placeholder="e.g. 25" required>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 3: Gender -->
                        <div x-show="step === 5" x-transition>
                            <label class="text-white">Gender</label>
                            <select name="gender" class="w-full p-2 border rounded-xl" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>



                        <!-- Step 5: Desired Body Type -->
                        <div x-show="step === 6" x-transition>
                            <label class="block text-white mb-4 text-lg font-semibold">Select Your Current Body Type</label>

                            <!-- Responsive Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                <!-- Each Body Type Card -->
                                <template x-for="(bodyType, index) in [
                                    { val: 'Skinny', img: 'assets/c1.png', label: 'Skinny' },
                                    { val: 'Lean', img: 'assets/c2.png', label: 'Lean' },
                                    { val: 'Fit', img: 'assets/c3.png', label: 'Fit' },
                                    { val: 'Overweight', img: 'assets/c4.png', label: 'Overweight' },
                                    { val: 'Obbesse', img: 'assets/c5.png', label: 'Obbesse' },
                                    { val: 'Overfixated', img: 'assets/c6.png', label: 'Overfixated' }
                                ]" :key="index">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="current_body_type" :value="bodyType.val" class="hidden peer" required>
                                        <div class="border-2 border-transparent peer-checked:border-blue-500 rounded-xl overflow-hidden transition">
                                            <img :src="bodyType.img" :alt="bodyType.label"
                                                 class="w-full h-32 object-cover sm:h-40 md:h-48">
                                            <p class="text-center text-white py-2 bg-gray-800 text-sm sm:text-base" x-text="bodyType.label"></p>
                                        </div>
                                    </label>
                                </template>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="flex justify-between mt-6">
                                <x-back/>

                                <x-next />

                            </div>
                        </div>



                        <!-- Step 5: Desired Body Type -->
                        <div x-show="step === 7" x-transition>
                            <label class="block text-white mb-4 text-lg font-semibold">Select Your Desired Body Type</label>

                            <!-- Responsive Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                <!-- Each Body Type Card -->
                                <template x-for="(bodyType, index) in [
                                    { val: 'Skinny', img: 'assets/1.png', label: 'Skinny' },
                                    { val: 'Lean', img: 'assets/2.png', label: 'Lean' },
                                    { val: 'Athletic', img: 'assets/3.png', label: 'Athletic' },
                                    { val: 'Fit', img: 'assets/4.png', label: 'Fit' },
                                    { val: 'Muscular', img: 'assets/5.png', label: 'Muscular' },
                                    { val: 'Bodybuilder', img: 'assets/6.png', label: 'Bodybuilder' }
                                ]" :key="index">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="desired_body_type" :value="bodyType.val" class="hidden peer" required>
                                        <div class="border-2 border-transparent peer-checked:border-blue-500 rounded-xl overflow-hidden transition">
                                            <img :src="bodyType.img" :alt="bodyType.label"
                                                 class="w-full h-32 object-cover sm:h-40 md:h-48">
                                            <p class="text-center text-white py-2 bg-gray-800 text-sm sm:text-base" x-text="bodyType.label"></p>
                                        </div>
                                    </label>
                                </template>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="flex justify-between mt-6">
                                <x-back/>

                                <x-next />

                            </div>
                        </div>



                        <!-- Step 6: Current Weight -->
                        <div x-show="step === 8" x-transition>
                            <label class="text-white">Current Weight (kg)</label>
                            <input type="number" name="weight" class="w-full p-2 border rounded-xl" placeholder="e.g. 75" required>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />

                            </div>
                        </div>

                        <!-- Step 7: Target Weight -->
                        <div x-show="step === 9" x-transition>
                            <label class="text-white">Target Weight (kg)</label>
                            <input type="number" name="target_weight" class="w-full p-2 border rounded-xl" placeholder="e.g. 70">
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 8: Height -->
                        <div x-show="step === 10" x-transition>
                            <label class="text-white">Height (cm)</label>
                            <input type="number" name="height" class="w-full p-2 border rounded-xl" placeholder="e.g. 175" required>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 9: Workout Time -->
                        <div x-show="step === 11" x-transition>
                            <label class="text-white">Preferred Workout Time</label>
                            <select name="workout_time" class="w-full p-2 border rounded-xl" required>
                                <option value="">Select time</option>
                                <option value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 10: Medical History -->
                        <div x-show="step === 12" x-transition>
                            <label class="text-white">Medical History</label>
                            <textarea name="medical_history" rows="3" class="w-full p-2 border rounded-xl" placeholder="Mention injuries or conditions if any"></textarea>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <x-next />
                            </div>
                        </div>

                        <!-- Step 11: Membership Plan -->
                        <div x-show="step === 13" x-transition>
                            <label class="text-white">Membership Plan</label>
                            <select name="membership_plan" class="w-full p-2 border rounded-xl" required>
                                <option value="">Choose plan</option>
                                <option value="1">1 Month</option>
                                <option value="3">3 Months</option>
                                <option value="6">6 Months</option>
                            </select>
                            <div class="flex justify-between mt-4">
                                <x-back/>
                                <button type="submit" class="bg-green-600 btn">Submit</button>
                            </div>
                        </div>
                    </form>



                </div>


      </div>







    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</header>
<x-footer />

  </body>
</html>
