<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | What's Cooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 h-screen flex flex-col justify-center items-center">

    <!-- ✅ Login Form Container -->
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-24 h-24 mx-auto rounded-full mb-4">
            <h1 class="text-3xl font-bold">Login</h1>
            <p class="mt-2 text-lg italic">“Ingredients in, recipes out"</p>
        </div>

        <!-- ✅ Show Success or Error Messages -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ✅ Login Form -->
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="you@example.com">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block font-semibold">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Enter Password">
            </div>

            <!-- ✅ Login Button -->
            <button type="submit"
                class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition">Login</button>
        </form>

        <!-- ✅ Redirect to Sign-Up -->
        <p class="text-center mt-4 text-sm">Don't have an account?
            <a href="{{ route('register') }}" class="text-purple-600 hover:underline">Sign Up here</a>.
        </p>
    </div>

    <!-- ✅ Footer -->
    <footer class="text-center p-4 mt-8 text-sm text-gray-500">
        © 2025 What's Cooking? All Rights Reserved.
    </footer>

</body>

</html>
