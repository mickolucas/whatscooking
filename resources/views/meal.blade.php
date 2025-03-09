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
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-16 h-16 rounded-full">
            @auth
                <span class="text-lg font-semibold text-gray-700">Hello, {{ auth()->user()->name }}!</span>
            @endauth
        </div>
        <nav class="flex space-x-4">
            <a href="/" class="px-4 py-2 border rounded hover:bg-gray-200">Home</a>
            <a href="{{ route('meal.index') }}" class="px-4 py-2 border rounded bg-gray-300">Meal</a>
            <a href="/contact" class="px-4 py-2 border rounded hover:bg-gray-200">Contact</a>
            <a href="/about" class="px-4 py-2 border rounded hover:bg-gray-200">About</a>

            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Login</a>
            @endguest
        </nav>
    </header>

    <!-- ✅ Main Content -->
    <main class="flex flex-col md:flex-row flex-1 p-4 gap-4">

        <!-- ✅ Ingredients Section -->
        <section class="w-full md:w-1/2 bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Ingredients</h2>

            <form id="ingredientForm" method="POST" action="{{ route('ingredients.store') }}">
                @csrf
                <div id="ingredientsContainer" class="space-y-4">
                    <div class="ingredient-input">
                        <label class="block mb-1 font-semibold">Ingredient</label>
                        <input type="text" name="ingredients[]" class="border border-gray-400 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-400" placeholder="Enter Ingredient">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" id="addIngredientBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow-md">➕ Add More</button>
                </div>

                <div class="mt-4 flex space-x-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 shadow-md flex-grow">✔ Submit</button>
                    <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 shadow-md flex-grow">✖ Reset</button>
                </div>
            </form>
        </section>

        <!-- ✅ Dish & Stored Ingredients Section -->
        <section class="w-full md:w-1/2 bg-gray-200 p-6 shadow-lg rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Available Dishes</h1>
            <div id="dishResult" class="text-gray-700">Fetching meals...</div>

            <br>

            <h2 class="text-2xl font-bold mb-4 mt-6">Stored Ingredients</h2>

            @if ($ingredients->count() > 0)
                <table class="w-full max-w-lg bg-white border border-gray-300 shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Ingredient Name</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredients as $ingredient)
                            <tr>
                                <td class="px-4 py-2 border text-center">{{ $ingredient->id }}</td>
                                <td class="px-4 py-2 border">{{ $ingredient->name }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <!-- ✅ Delete Button -->
                                    <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 shadow-md">🗑 Delete</button>
                                    </form>
                                    <!-- ✅ Suggest Substitute Button -->
                                    <button onclick="suggestSubstitute('{{ $ingredient->name }}')" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 shadow-md">
                                        🛠 Suggest Alternative
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-700">No ingredients stored yet.</p>
            @endif
        </section>

    </main>

    <!-- ✅ JavaScript -->
    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("addIngredientBtn").addEventListener("click", function () {
        let newIngredientDiv = document.createElement("div");
        newIngredientDiv.classList.add("ingredient-input", "mt-2");
        newIngredientDiv.innerHTML = `
            <label class="block mb-1 font-semibold">Ingredient</label>
            <input type="text" name="ingredients[]" class="border border-gray-400 rounded-md p-2 w-full focus:ring-2 focus:ring-blue-400" placeholder="Enter Ingredient">
        `;
        document.getElementById("ingredientsContainer").appendChild(newIngredientDiv);
    });

    fetch("{{ route('meal.suggest') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        let dishResult = document.getElementById("dishResult");
        if (data.meals && data.meals.length > 0) {
            dishResult.innerHTML = data.meals.map(meal => `
                <div class="p-4 border rounded-lg bg-white shadow-md text-center">
                    <img src="${meal.strMealThumb}" alt="${meal.strMeal}" class="w-20 h-20 rounded-md mx-auto mb-2">
                    <h3 class="font-semibold">${meal.strMeal}</h3>
                    <button onclick="getCookingInstructions('${meal.strMeal}')" class="bg-blue-500 text-white px-2 py-1 mt-2 rounded-md">
                        View Steps (AI)
                    </button>
                </div>
            `).join('');
        } else {
            dishResult.innerHTML = "<span class='text-red-500'>No matching dishes found.</span>";
        }
    });

});

// ✅ AI Suggest Substitute
function suggestSubstitute(ingredient) {
    fetch("{{ route('ai.suggest.substitutes') }}", {
        method: "POST",
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" },
        body: JSON.stringify({ ingredient })
    })
    .then(response => response.json())
    .then(data => alert(`Substitutes for ${ingredient}:\n\n${data.substitutes}`))
    .catch(error => alert("Failed to fetch substitutes."));
}
</script>

</body>
</html>
