<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | What's Cooking</title>
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

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-center items-center p-4 font-sans">

    <!-- Registration Form Container -->
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8 border border-gray-200">
        <div class="text-center mb-8">
            <div class="relative mx-auto w-24 h-24 mb-6">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-accent to-green-300 rounded-full blur opacity-30"></div>
                <img src="{{ asset('images/logo.png') }}" alt="What's Cooking Logo" class="relative w-24 h-24 mx-auto rounded-full shadow-md">
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Create Account</h1>
            <p class="mt-2 text-gray-600">Join our community of home chefs</p>
        </div>

        <!-- Show Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 text-red-800 p-4 rounded-md mb-6">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Show Success Message -->
        @if (session('success'))
            <div class="bg-green-50 text-green-800 p-4 rounded-md mb-6 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Sign-Up Form -->
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                        class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent"
                        placeholder="John Doe">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                        class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent"
                        placeholder="you@example.com">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent"
                        placeholder="••••••••">
                </div>
                <p class="mt-1 text-xs text-gray-500">Password must be at least 8 characters</p>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-accent focus:ring-accent border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="text-gray-600">
                        I agree to the <a href="#" class="text-accent hover:text-accent-dark">Terms of Service</a> and <a href="#" class="text-accent hover:text-accent-dark">Privacy Policy</a>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-accent hover:bg-accent-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent transition duration-150">
                Create Account
            </button>
        </form>

        <!-- Social Sign Up -->
        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-3">
                <div>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0001 2.00001C6.47793 2.00001 2.00006 6.47788 2.00006 12C2.00006 17.5221 6.47793 22 12.0001 22C17.5222 22 22.0001 17.5221 22.0001 12C22.0001 6.47788 17.5222 2.00001 12.0001 2.00001ZM18.8082 8.20724H16.9634C16.7742 7.5457 16.5558 6.89724 16.0652 6.40668C15.5747 5.91612 14.9262 5.69776 14.2647 5.50861V7.35343C14.9262 7.54258 15.1446 7.76094 15.3921 8.20724H12.0001V10.0521H15.3921C15.1446 10.4984 14.9262 10.7167 14.2647 10.9059V12.7507H16.0652C16.5558 12.2601 16.7742 11.6117 16.9634 10.9501H18.8082V8.20724ZM10.1553 10.0521H7.73579V8.20724H10.1553V5.78776H12.0001V8.20724H14.4196V10.0521H12.0001V12.4715H10.1553V10.0521ZM5.89097 10.9501C6.08012 11.6117 6.29848 12.2601 6.78904 12.7507H8.58959V10.9059C7.92806 10.7167 7.70971 10.4984 7.46222 10.0521H10.1553V12.4715H7.73579V14.3163H5.89097V10.9501ZM7.73579 16.1611H5.89097V18.006H7.73579V16.1611ZM9.58061 16.1611V18.006H11.4254V16.1611H9.58061ZM13.2702 16.1611V18.006H15.115V16.1611H13.2702ZM16.9598 16.1611V18.006H18.8046V16.1611H16.9598ZM16.9598 14.3163V12.4715H18.8046V14.3163H16.9598ZM13.2702 14.3163V12.4715H15.115V14.3163H13.2702ZM9.58061 14.3163V12.4715H11.4254V14.3163H9.58061Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>

                <div>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-accent hover:text-accent-dark">
                    Sign in
                </a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full max-w-md text-center mt-8 mb-4">
        <div class="flex items-center justify-center space-x-4 mb-4">
            <a href="/" class="text-gray-500 hover:text-accent">
                <span class="sr-only">Home</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <a href="/about" class="text-gray-500 hover:text-accent">
                <span class="sr-only">About</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="/contact" class="text-gray-500 hover:text-accent">
                <span class="sr-only">Contact</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
            </a>
        </div>
        <p class="text-xs text-gray-500">
            © 2025 What's Cooking? All Rights Reserved.
        </p>
    </footer>

</body>

</html>
