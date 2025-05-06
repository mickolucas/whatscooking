<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking?</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: {
                            light: '#4ade80',
                            DEFAULT: '#22c55e',
                            dark: '#16a34a',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col font-sans">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="What's Cooking Logo" class="w-12 h-12 rounded-full shadow-sm">
                    <span class="ml-3 text-xl font-semibold text-gray-800 hidden sm:block">
                        @auth
                            Hello, {{ auth()->user()->name }}!
                        @else
                            What's Cooking?
                        @endauth
                    </span>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-4">
                    <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Home</a>
                    <a href="{{ route('meal.index') }}" class="px-3 py-2 rounded-md text-sm font-medium bg-accent text-white shadow-sm hover:bg-accent-dark transition duration-150">Meal</a>
                    <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Contact</a>
                    <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">About</a>

                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium bg-red-500 text-white hover:bg-red-600 transition duration-150">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium bg-accent text-white hover:bg-accent-dark transition duration-150">Login</a>
                    @endguest
                </nav>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobileMenuButton" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div class="hidden md:hidden" id="mobileMenu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Home</a>
                <a href="{{ route('meal.index') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-accent text-white">Meal</a>
                <a href="/contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Contact</a>
                <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">About</a>
                
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium bg-red-500 text-white hover:bg-red-600">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-accent text-white hover:bg-accent-dark">Login</a>
                @endguest
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Find Recipes with Your Ingredients</h1>
            <p class="mt-2 text-lg text-gray-600">Enter the ingredients you have, and we'll show you what you can cook!</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Ingredients Form Section -->
            <section class="w-full lg:w-1/2">
                <div class="bg-white p-6 shadow-md rounded-lg border border-gray-200">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Add Your Ingredients
                    </h2>
                    <form id="ingredientForm" method="POST" action="{{ route('ingredients.store') }}" class="space-y-4">
                        @csrf
                        <div id="ingredientsContainer" class="space-y-4">
                            <div class="ingredient-input">
                                <label class="block mb-1 font-medium text-gray-700">Ingredient</label>
                                <input type="text" name="ingredients[]" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-accent focus:border-accent" placeholder="Enter ingredient (e.g., chicken, tomatoes, rice)">
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-6">
                            <button type="button" id="addIngredientBtn" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-accent" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Add More
                            </button>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-accent hover:bg-accent-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Find Recipes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Stored Ingredients Table -->
                <div class="mt-8 bg-white p-6 shadow-md rounded-lg border border-gray-200">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Your Stored Ingredients
                    </h2>
                    @if ($ingredients->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ingredient Name</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($ingredients as $ingredient)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ingredient->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $ingredient->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this ingredient?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-2">No ingredients stored yet.</p>
                            <p class="text-sm">Add ingredients using the form above to get started.</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Available Dishes Section -->
            <section class="w-full lg:w-1/2">
                <div class="bg-white p-6 shadow-md rounded-lg border border-gray-200 h-full">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Available Recipes
                    </h2>
                    <div id="dishResult" class="mt-4">
                        <div class="flex justify-center items-center py-12">
                            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-accent"></div>
                            <span class="ml-3 text-gray-600">Fetching recipes...</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById("mobileMenuButton");
            const mobileMenu = document.getElementById("mobileMenu");
            
            mobileMenuButton.addEventListener("click", function() {
                mobileMenu.classList.toggle("hidden");
            });
            
            // Add More Ingredients Button
            let ingredientCounter = 1;
            const maxIngredients = 10;
            const ingredientsContainer = document.getElementById("ingredientsContainer");
            const addIngredientBtn = document.getElementById("addIngredientBtn");

            addIngredientBtn.addEventListener("click", function () {
                if (ingredientCounter < maxIngredients) {
                    ingredientCounter++;
                    const newIngredientDiv = document.createElement("div");
                    newIngredientDiv.classList.add("ingredient-input");
                    newIngredientDiv.innerHTML = `
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <label class="block mb-1 font-medium text-gray-700">Ingredient</label>
                                <input type="text" name="ingredients[]" class="border border-gray-300 rounded-md p-2 w-full focus:ring-2 focus:ring-accent focus:border-accent" placeholder="Enter ingredient (e.g., chicken, tomatoes, rice)">
                            </div>
                            <button type="button" class="remove-ingredient ml-2 mt-6 text-red-500 hover:text-red-700" title="Remove ingredient">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    `;
                    ingredientsContainer.appendChild(newIngredientDiv);
                    
                    // Add event listener to the remove button
                    const removeButton = newIngredientDiv.querySelector('.remove-ingredient');
                    removeButton.addEventListener('click', function() {
                        newIngredientDiv.remove();
                        ingredientCounter--;
                    });
                } else {
                    alert("Maximum of 10 ingredients allowed.");
                }
            });

            // Fetch Meals
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
                    dishResult.innerHTML = `
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            ${data.meals.map(meal => `
                                <div class="p-4 border rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <div class="flex items-center mb-3">
                                        <img src="${meal.strMealThumb}" alt="${meal.strMeal}" class="w-16 h-16 rounded-md object-cover">
                                        <h3 class="ml-3 font-semibold text-gray-900">${meal.strMeal}</h3>
                                    </div>
                                    <p class="text-sm text-gray-600 line-clamp-3 mb-3">${meal.strInstructions.substring(0, 100)}...</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-gray-500">Category: ${meal.strCategory || 'N/A'}</span>
                                        <button onclick="showInstructions('${meal.strMeal}', \`${meal.strInstructions.replace(/"/g, '&quot;')}\`)" 
                                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-accent hover:bg-accent-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            View Recipe
                                        </button>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;
                } else {
                    dishResult.innerHTML = `
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-2 text-gray-600">No matching recipes found.</p>
                            <p class="text-sm text-gray-500">Try adding different ingredients or fewer restrictions.</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error fetching recipes:', error);
                let dishResult = document.getElementById("dishResult");
                dishResult.innerHTML = `
                    <div class="text-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="mt-2 text-red-600">Error loading recipes.</p>
                        <p class="text-sm text-gray-500">Please try again later or contact support.</p>
                    </div>
                `;
            });
        });

        // Show Instructions Modal
        function showInstructions(title, instructions) {
            let modal = document.createElement("div");
            modal.classList.add("fixed", "inset-0", "bg-black", "bg-opacity-50", "flex", "items-center", "justify-center", "p-4", "z-50");

            modal.innerHTML = `
                <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] flex flex-col">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-900">${title}</h2>
                            <button class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="this.closest('.fixed').remove()">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6 overflow-y-auto flex-grow">
                        <h3 class="font-medium text-gray-900 mb-2">Instructions:</h3>
                        <div class="prose prose-sm max-w-none text-gray-700">
                            ${instructions.replace(/\n/g, "<br>")}
                        </div>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <button onclick="this.closest('.fixed').remove()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-accent text-base font-medium text-white hover:bg-accent-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);
            
            // Prevent scrolling of the body when modal is open
            document.body.style.overflow = 'hidden';
            
            // Re-enable scrolling when modal is closed
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.remove();
                    document.body.style.overflow = '';
                }
            });
        }
    </script>

</body>
</html>
