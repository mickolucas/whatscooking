<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Cooking - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 rounded-b-lg shadow-lg p-8 mt-6 h-screen flex flex-col">

    <!-- ✅ Navbar -->
    <header class="flex justify-between items-center p-4 border-b border-gray-400">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Website Logo" class="w-20 h-20 rounded-full">

        <!-- Navigation links -->
        <nav class="flex space-x-4">
    <a href="/" class="px-4 py-2 border rounded hover:bg-gray-200">Home</a>
    <a href="/meal" class="px-4 py-2 border rounded hover:bg-gray-200">Meal</a>
    <a href="/contact" class="px-4 py-2 border rounded bg-gray-300">Contact</a>
    <a href="/about" class="px-4 py-2 border rounded hover:bg-gray-200">About</a>

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
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold">Contact Us</h1>
            <p class="text-gray-600 mt-2">We'd love to hear from you! Reach out with any questions or feedback.</p>
        </div>

        <!-- ✅ Contact Form & Details -->
        <div class="flex flex-col md:flex-row gap-8 justify-center">
            
            <!-- Contact Form -->
            <div class="w-full md:w-1/2 bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4 text-center">Send Us a Message</h2>
                <form action="/send-message" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block font-semibold">Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Your Name">
                    </div>

                    <div>
                        <label for="email" class="block font-semibold">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="you@example.com">
                    </div>

                    <div>
                        <label for="subject" class="block font-semibold">Subject</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Subject">
                    </div>

                    <div>
                        <label for="message" class="block font-semibold">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Write your message here..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition">Send
                        Message</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="w-full md:w-1/3 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4 text-center">Contact Information</h2>

                <div class="space-y-4 text-gray-700">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 01-8 0 4 4 0 118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14v6m0 0l-3-3m3 3l3-3" />
                        </svg>
                        <span>support@whatscooking.com</span>
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5h18M9 3v2m6-2v2M4 9h16M4 15h16M4 21h16" />
                        </svg>
                        <span>+63 912 345 6789</span>
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0-1.38-1.12-2.5-2.5-2.5S7 9.62 7 11s1.12 2.5 2.5 2.5S12 12.38 12 11zm6 2a5.985 5.985 0 00-6-6 5.985 5.985 0 00-6 6c0 2.43 1.43 4.5 3.5 5.5h5A5.985 5.985 0 0018 13z" />
                        </svg>
                        <span>Makati City, Philippines</span>
                    </div>
                </div>


            </div>

        </div>
    </main>

    <!-- ✅ Footer -->
    <footer class="text-center p-4 bg-white shadow-inner">
        © 2025 What's Cooking? All Rights Reserved.
    </footer>

</body>

</html>
