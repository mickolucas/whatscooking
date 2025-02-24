<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking - About</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    
    <!-- ✅ Navbar -->
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-16 h-16 rounded-full">
        
        <!-- Navigation Links -->
        <nav class="flex space-x-4">
    <a href="/" class="px-4 py-2 border rounded hover:bg-gray-200">Home</a>
    <a href="/meal" class="px-4 py-2 border rounded hover:bg-gray-200">Meal</a>
    <a href="/contact" class="px-4 py-2 border rounded hover:bg-gray-200">Contact</a>
    <a href="/about" class="px-4 py-2 border rounded bg-gray-300">About</a>

    @auth
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="px-4 py-2 bg-green-500 text-white rounded">Login</a>
    @endguest
</nav>

    </header>
    
    <!-- ✅ Main Content -->
    <main class="flex-grow p-8">
        <h1 class="text-4xl font-bold text-center mb-8">About What's Cooking?</h1>
        
        <div class="flex justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-2/3 lg:w-1/2">
                <h2 class="text-2xl font-bold mb-2">About Us</h2>
                <p class="text-gray-700">
                    Welcome to <strong>What's Cooking?</strong> – your ultimate kitchen companion!
                    Our goal is to help home cooks and food enthusiasts discover delicious recipes
                    based on the ingredients they have on hand. Whether you're an experienced chef or
                    just starting your culinary journey, our platform is designed to inspire creativity in the kitchen.
                    We strive to make cooking more accessible, fun, and resourceful by offering a wide variety of recipes
                    tailored to your preferences and pantry. With smart ingredient matching and meal suggestions,
                    <em>What's Cooking?</em> helps you reduce food waste, save time, and explore new flavors—all while
                    turning ordinary ingredients into extraordinary dishes.
                </p>
            </div>
        </div>
        
        <!-- Our Mission Section -->
        <div class="flex justify-center mt-6">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full md:w-2/3 lg:w-1/2">
                <h2 class="text-2xl font-bold mb-2">Our Mission</h2>
                <p class="text-gray-700">
                    We aim to reduce food waste and promote creative cooking. By leveraging machine learning technology,
                    we analyze ingredients and offer smart recipe suggestions tailored to what’s in your kitchen.
                    Our vision is to make home cooking fun, accessible, and resourceful for everyone.
                </p>
            </div>
        </div>
    </main>
    
    <!-- ✅ Footer -->
    <footer class="text-center p-4 bg-white shadow-inner">
        © 2025 What's Cooking? All Rights Reserved.
    </footer>
    
</body>
</html>
