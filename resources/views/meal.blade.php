<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking?</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- ✅ Navbar -->
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-16 h-16 rounded-full">

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
    <main class="flex flex-col md:flex-row flex-1 p-4 gap-4">

        <!-- ✅ Ingredients Section -->
        <section class="w-full md:w-1/2 bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Ingredients</h2>

            <form id="ingredientForm" method="POST" action="#">
                <!-- Ingredient Inputs -->
                <div class="space-y-4">
                    <div>
                        <label for="ing1" class="block mb-1 font-semibold">Ingredient 1</label>
                        <input type="text" id="ing1" name="ing1"
                            class="border border-gray-400 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter Ingredient">
                    </div>

                    <div>
                        <label for="ing2" class="block mb-1 font-semibold">Ingredient 2</label>
                        <input type="text" id="ing2" name="ing2"
                            class="border border-gray-400 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter Ingredient">
                    </div>

                    <div>
                        <label for="ing3" class="block mb-1 font-semibold">Ingredient 3</label>
                        <input type="text" id="ing3" name="ing3"
                            class="border border-gray-400 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter Ingredient">
                    </div>

                    <div>
                        <label for="ing4" class="block mb-1 font-semibold">Ingredient 4</label>
                        <input type="text" id="ing4" name="ing4"
                            class="border border-gray-400 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter Ingredient">
                    </div>
                </div>

             
                <div class="mt-4">
                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Submit</button>
                    <button type="reset"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition ml-2">Reset</button>
                </div>
            </form>
        </section>

     
        <section class="w-full md:w-1/2 bg-gray-200 p-6 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Dish</h2>
            <p id="dishResult" class="text-gray-700">Available dishes will appear here after entering ingredients.</p>
        </section>

    </main>

   
    <footer class="text-center p-4 bg-white shadow-inner">
        © 2025 What's Cooking? All Rights Reserved.
    </footer>

</body>

</html>
