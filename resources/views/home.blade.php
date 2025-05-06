<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
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

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col font-sans">
    
    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="What's Cooking Logo" class="w-12 h-12 rounded-full shadow-sm">
                    <span class="ml-3 text-xl font-semibold text-gray-800 hidden sm:block">What's Cooking?</span>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-4">
                    <a href="/" class="px-3 py-2 rounded-md text-sm font-medium bg-accent text-white shadow-sm hover:bg-accent-dark transition duration-150">Home</a>
                    <a href="/meal" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Meal</a>
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
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent" aria-expanded="false">
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
        <div class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium bg-accent text-white">Home</a>
                <a href="/meal" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Meal</a>
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
    
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-accent-light/10 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="md:flex md:items-center md:justify-between">
                <div class="md:w-1/2 md:pr-10">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">What's Cooking?</span>
                        <span class="block text-accent mt-2">Ingredients in, recipes out</span>
                    </h1>
                    <p class="mt-6 text-xl text-gray-500 max-w-3xl">
                        Transform your kitchen experience with our smart recipe finder. Simply enter the ingredients you have, and we'll show you what you can cook!
                    </p>

                </div>
                <div class="mt-10 md:mt-0 md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-accent to-green-300 rounded-full blur opacity-30"></div>
                        <img src="{{ asset('images/logo.png') }}" alt="What's Cooking Logo" class="relative w-64 h-64 md:w-80 md:h-80 rounded-full shadow-xl">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
     
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>
    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Why Choose What's Cooking?
                </h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">
                    Our platform makes cooking easier, more fun, and helps reduce food waste.
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="bg-gray-50 rounded-xl p-8 shadow-sm hover:shadow-md transition duration-300">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Smart Recipe Matching</h3>
                    <p class="mt-4 text-gray-500">
                        Our algorithm finds the perfect recipes based on ingredients you already have in your kitchen.
                    </p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-8 shadow-sm hover:shadow-md transition duration-300">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Save Time & Money</h3>
                    <p class="mt-4 text-gray-500">
                        Stop wasting time planning meals or buying ingredients you don't need. Use what you have!
                    </p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-8 shadow-sm hover:shadow-md transition duration-300">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Reduce Food Waste</h3>
                    <p class="mt-4 text-gray-500">
                        Use up ingredients before they expire and help the environment by reducing food waste.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    How It Works
                </h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">
                    Finding recipes has never been easier. Just follow these simple steps:
                </p>
            </div>
            
            <div class="mt-16">
                <div class="relative">
                    <!-- Steps connector line -->
                    <div class="hidden md:block absolute top-1/2 w-full h-0.5 bg-gray-200 -translate-y-1/2"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="relative bg-white rounded-xl p-8 shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-accent text-white mx-auto mb-5 relative z-10">
                                <span class="text-lg font-bold">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 text-center">Enter Your Ingredients</h3>
                            <p class="mt-4 text-gray-500 text-center">
                                Tell us what ingredients you have available in your kitchen pantry.
                            </p>
                        </div>
                        
                        <div class="relative bg-white rounded-xl p-8 shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-accent text-white mx-auto mb-5 relative z-10">
                                <span class="text-lg font-bold">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 text-center">Browse Matching Recipes</h3>
                            <p class="mt-4 text-gray-500 text-center">
                                Our system will find recipes that match your available ingredients.
                            </p>
                        </div>
                        
                        <div class="relative bg-white rounded-xl p-8 shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-accent text-white mx-auto mb-5 relative z-10">
                                <span class="text-lg font-bold">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 text-center">Cook & Enjoy</h3>
                            <p class="mt-4 text-gray-500 text-center">
                                Follow the recipe instructions and enjoy your delicious meal!
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 text-center">
                    <a href="/meal" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-accent hover:bg-accent-dark transition duration-150">
                        Try It Now
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Popular Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Popular Recipe Categories
                </h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">
                    Explore our most popular recipe collections
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group relative rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gray-200 group-hover:opacity-75 transition duration-300">
                        <div class="w-full h-full flex items-center justify-center bg-accent/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Quick & Easy</h3>
                        <p class="mt-1 text-sm text-gray-500">Ready in 30 minutes or less</p>
                    </div>
                    <a href="#" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View Quick & Easy recipes</span>
                    </a>
                </div>
                
                <div class="group relative rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gray-200 group-hover:opacity-75 transition duration-300">
                        <div class="w-full h-full flex items-center justify-center bg-accent/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Vegetarian</h3>
                        <p class="mt-1 text-sm text-gray-500">Plant-based delicious meals</p>
                    </div>
                    <a href="#" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View Vegetarian recipes</span>
                    </a>
                </div>
                
                <div class="group relative rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gray-200 group-hover:opacity-75 transition duration-300">
                        <div class="w-full h-full flex items-center justify-center bg-accent/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Budget-Friendly</h3>
                        <p class="mt-1 text-sm text-gray-500">Affordable and delicious options</p>
                    </div>
                    <a href="#" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View Budget-Friendly recipes</span>
                    </a>
                </div>
                
                <div class="group relative rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gray-200 group-hover:opacity-75 transition duration-300">
                        <div class="w-full h-full flex items-center justify-center bg-accent/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Family Favorites</h3>
                        <p class="mt-1 text-sm text-gray-500">Crowd-pleasing recipes for everyone</p>
                    </div>
                    <a href="#" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View Family Favorites recipes</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    What Our Users Say
                </h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">
                    Don't just take our word for it - hear from our satisfied users
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"What's Cooking has completely changed how I approach meal planning. I used to throw away so much food, but now I can use everything in my fridge!"</p>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 font-semibold">JD</div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Jane Doe</p>
                            <p class="text-xs text-gray-500">Home Cook</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"As a busy parent, I never know what to cook for dinner. This app has saved me countless trips to the grocery store and my kids love the meals!"</p>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 font-semibold">MS</div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Michael Smith</p>
                            <p class="text-xs text-gray-500">Parent of 3</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"I'm a college student on a budget, and this app has helped me make delicious meals with minimal ingredients. Highly recommend!"</p>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 font-semibold">AJ</div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Alex Johnson</p>
                            <p class="text-xs text-gray-500">Student</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-accent rounded-2xl shadow-xl overflow-hidden">
                <div class="px-6 py-12 sm:px-12 lg:px-16">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                        <div>
                            <h2 class="text-3xl font-extrabold text-white">
                                Get Weekly Recipe Inspiration
                            </h2>
                            <p class="mt-4 text-lg text-white text-opacity-90">
                                Sign up for our newsletter to receive weekly recipe ideas, cooking tips, and special offers.
                            </p>
                        </div>
                        <div class="mt-6 lg:mt-0">
                            <form class="sm:flex">
                                <label for="email-address" class="sr-only">Email address</label>
                                <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border-white focus:ring-white focus:border-white rounded-md" placeholder="Enter your email">
                                <button type="submit" class="mt-3 w-full px-6 py-3 border border-transparent text-base font-medium rounded-md text-accent bg-white shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white sm:mt-0 sm:ml-3 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                                    Subscribe
                                </button>
                            </form>
                            <p class="mt-3 text-sm text-white text-opacity-75">
                                We care about your data. Read our <a href="#" class="font-medium text-white underline">Privacy Policy</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="What's Cooking Logo" class="w-10 h-10 rounded-full">
                        <span class="ml-3 text-xl font-semibold text-white">What's Cooking?</span>
                    </div>
                    <p class="mt-4 text-base text-gray-400">
                        Transform your kitchen experience with our smart recipe finder. Simply enter the ingredients you have, and we'll show you what you can cook!
                    </p>
                    <div class="mt-6 flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Resources</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Recipe Guide</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Cooking Tips</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Ingredient Substitutes</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Blog</a>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Company</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="/about" class="text-base text-gray-400 hover:text-gray-300">About</a>
                        </li>
                        <li>
                            <a href="/contact" class="text-base text-gray-400 hover:text-gray-300">Contact</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-gray-300">Terms of Service</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 border-t border-gray-800 pt-8">
                <p class="text-base text-gray-400 text-center">
                    © 2025 What's Cooking? All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
