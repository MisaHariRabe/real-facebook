<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Facebook Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-5"
            id="multiStepForm">
            @csrf

            <!-- Step 1 -->
            <div class="step" id="step1">
                <div>
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded p-2" required>
                    @error('username')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2" required>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="nextStep()"
                        class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Next</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step hidden" id="step2">
                <div>
                    <label class="block mb-1">Password</label>
                    <input type="password" name="password" class="w-full border rounded p-2" required>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block mb-1">Date of birth</label>
                    <input type="date" name="date_of_birth" class="w-full border rounded p-2" required>
                    @error('date_of_birth')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1">Gender</label>
                    <div class="flex gap-4 mt-1">
                        <label><input type="radio" name="gender" value="male" checked> Male</label>
                        <label><input type="radio" name="gender" value="female"> Female</label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="prevStep()"
                        class="bg-gray-400 text-white px-4 py-2 rounded mt-4">Back</button>
                    <button type="button" onclick="nextStep()"
                        class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Next</button>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step hidden" id="step3">
                <div>
                    <label class="block mb-1">Profile picture</label>
                    <input type="file" name="profile_photo" class="w-full border rounded p-2">
                    @error('profile_photo')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1">Bio</label>
                    <textarea name="bio" class="w-full border rounded p-2"></textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="prevStep()"
                        class="bg-gray-400 text-white px-4 py-2 rounded mt-4">Back</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Register</button>
                </div>
            </div>

            <p class="text-center mt-6 text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500">Login</a>
            </p>
        </form>
    </div>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle('hidden', i !== index);
            });
        }

        function nextStep() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        // Initialize
        showStep(currentStep);
    </script>
</body>

</html>
