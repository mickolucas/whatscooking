<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up | What's Cooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center mb-4">Sign Up</h1>

        <!-- ✅ Show Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ✅ Show Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- ✅ Sign-Up Form -->
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block font-semibold">Full Name</label>
                <input type="text" id="name" name="name" required
                    value="{{ old('name') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Your Full Name">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" id="email" name="email" required
                    value="{{ old('email') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="you@example.com">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block font-semibold">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Enter Password">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block font-semibold">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Re-enter Password">
            </div>

            <!-- ✅ Submit Button -->
            <button type="submit"
                class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition">Sign Up</button>
        </form>

        <p class="text-center mt-4">Already have an account?
            <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Login here</a>.
        </p>

        <!-- ✅ Link to Homepage -->
        <p class="text-center mt-2">
            <a href="{{ route('home') }}" class="text-gray-500 hover:underline text-sm">← Back to Home</a>
        </p>
    </div>

</body>

</html>
