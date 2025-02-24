<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 rounded-b-lg shadow-lg p-8 mt-6 h-screen">

    <div>
        <div class="text-center">

            <!-- ✅ Navigation Bar -->
            <div class="space-x-4 mb-6">
                <a href="/" class="px-4 py-2 bg-white-600 text-black rounded hover:bg-purple-100 transition border border-black">Home</a>
                <a href="/meal" class="px-4 py-2 bg-white-600 text-black rounded hover:bg-purple-100 transition border border-black">Meal</a>
                <a href="/contact" class="px-4 py-2 bg-white-600 text-black rounded hover:bg-purple-100 transition border border-black">Contact</a>
                <a href="/about" class="px-4 py-2 bg-white-600 text-black rounded hover:bg-purple-100 transition border border-black">About</a>

                <!-- ✅ Authenticated User: Show Logout -->
                @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                </form>
                @endauth

                <!-- ✅ Guest User: Show Login -->
                @guest
                <a href="{{ route('login') }}" class="px-4 py-2 bg-green-500 text-white rounded">Login</a>
                @endguest

            </div>

            <br>
            <hr class="my-4 border-t-2 border-black" />
            <br>

            <!-- ✅ Main Content -->
            <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-70 h-700 mx-auto mb-4 rounded-full">
            <h1 class="text-3xl font-bold">What's Cooking?</h1>
            <p class="mt-2 text-lg italic">“Ingredients in, recipes out"</p>

        </div>
    </div>

    <!-- ✅ Footer -->
    <footer class="text-center p-4 bg-white shadow-inner">
        © 2025 What's Cooking? All Rights Reserved.
    </footer>

</body>

</html>
