<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking - About</title>
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
                    <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Home</a>
                    <a href="/meal" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Meal</a>
                    <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition duration-150">Contact</a>
                    <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium bg-accent text-white shadow-sm hover:bg-accent-dark transition duration-150">About</a>

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
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Home</a>
                <a href="/meal" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Meal</a>
                <a href="/contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100">Contact</a>
                <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium bg-accent text-white">About</a>
                
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
    <div class="bg-gradient-to-b from-accent-light/10 to-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">About What's Cooking?</h1>
            <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">Discover the story behind your favorite kitchen companion.</p>
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- About Us Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">
                <div class="md:flex">
                    <div class="md:shrink-0">
                        <div class="h-48 w-full md:h-full md:w-48 bg-accent/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">About Us</h2>
                        <p class="text-gray-600 leading-relaxed">
                            Welcome to <span class="font-semibold text-accent">What's Cooking?</span> – your ultimate kitchen companion!
                            Our goal is to help home cooks and food enthusiasts discover delicious recipes
                            based on the ingredients they have on hand. Whether you're an experienced chef or
                            just starting your culinary journey, our platform is designed to inspire creativity in the kitchen.
                        </p>
                        <p class="text-gray-600 leading-relaxed mt-4">
                            We strive to make cooking more accessible, fun, and resourceful by offering a wide variety of recipes
                            tailored to your preferences and pantry. With smart ingredient matching and meal suggestions,
                            <em>What's Cooking?</em> helps you reduce food waste, save time, and explore new flavors—all while
                            turning ordinary ingredients into extraordinary dishes.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Our Mission Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">
                <div class="md:flex">
                    <div class="p-8 md:order-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Our Mission</h2>
                        <p class="text-gray-600 leading-relaxed">
                            We aim to reduce food waste and promote creative cooking. By leveraging machine learning technology,
                            we analyze ingredients and offer smart recipe suggestions tailored to what's in your kitchen.
                            Our vision is to make home cooking fun, accessible, and resourceful for everyone.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                Reduce Food Waste
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                Smart Recipes
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                Machine Learning
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Accessible Cooking
                            </span>
                        </div>
                    </div>
                    <div class="md:shrink-0 md:order-2">
                        <div class="h-48 w-full md:h-full md:w-48 bg-accent/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- How It Works Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">How It Works</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">1. Input Your Ingredients</h3>
                            <p class="text-gray-500">Tell us what you have in your kitchen, and we'll do the rest.</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">2. Discover Recipes</h3>
                            <p class="text-gray-500">Our algorithm matches your ingredients with thousands of recipes.</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-accent text-white mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">3. Start Cooking</h3>
                            <p class="text-gray-500">Follow our step-by-step instructions to create delicious meals.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Meet Our Team</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gray-200 mb-4 overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Wubba</h3>
                            <p class="text-accent">Founder & CEO</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gray-200 mb-4 overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Bleu</h3>
                            <p class="text-accent">Developer</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gray-200 mb-4 overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Coco</h3>
                            <p class="text-accent">Lead Developer</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto h-32 w-32 rounded-full bg-gray-200 mb-4 overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Sean</h3>
                            <p class="text-accent">Nutritionist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">What's Cooking?</h3>
                    <p class="text-gray-300 text-sm">Your ultimate kitchen companion helping you discover delicious recipes with ingredients you already have.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="text-gray-300 hover:text-white transition duration-150">Home</a></li>
                        <li><a href="/meal" class="text-gray-300 hover:text-white transition duration-150">Meal</a></li>
                        <li><a href="/contact" class="text-gray-300 hover:text-white transition duration-150">Contact</a></li>
                        <li><a href="/about" class="text-gray-300 hover:text-white transition duration-150">About</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-150">Blog</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-150">Recipes</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-150">Cooking Tips</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-150">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-150">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8