<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOTEL</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-400">

    <nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2">
                    <img src="https://images.trvl-media.com/lodging/84000000/83530000/83526600/83526593/80723385.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill" 
                         alt="Hotel Logo" 
                         class="w-10 h-10 object-cover rounded-full border border-gray-600 shadow-sm">
                    <span class="text-white font-bold text-lg tracking-wider hidden sm:block">ONE HOTEL</span>
                </a>
            </div>

            <div class="hidden md:flex items-center gap-2 uppercase text-sm font-semibold">
                <a href="{{ route('home') }}" class="px-3 py-2 text-white rounded-lg hover:bg-gray-700 transition">Home</a>
                <a href="#" class="px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">About</a>
                <a href="#" class="px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">Contact Us</a>
                <a href="#" class="px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">Booking</a>
            </div>

            <div class="hidden md:flex items-center gap-4 uppercase text-sm font-semibold">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin') }}" class="text-yellow-400 hover:text-yellow-300 transition">Admin Page</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-300 hover:underline transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition shadow-sm">Register</a>
                @endauth
            </div>

            <div class="flex md:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none transition">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{'block': open, 'hidden': !open }" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden bg-gray-900 border-t border-gray-800 px-4 pt-2 pb-4 space-y-2 uppercase text-sm font-medium">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-white bg-gray-800 rounded-md">Home</a>
        <a href="#" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md">About</a>
        <a href="#" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md">Contact Us</a>
        <a href="#" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md">Booking</a>
        
        <div class="border-t border-gray-800 my-2 pt-2"></div>

        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}" class="block px-3 py-2 text-yellow-400 hover:bg-gray-800 rounded-md">Admin Page</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="block w-full">
                @csrf
                <button type="submit" class="block w-full text-left px-3 py-2 text-red-400 hover:bg-gray-800 rounded-md">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-300 hover:bg-gray-800 rounded-md">Login</a>
            <a href="{{ route('register') }}" class="block px-3 py-2 text-blue-400 hover:bg-gray-800 rounded-md">Register</a>
        @endauth
    </div>
</nav>

    <div>
        @yield('content')
    </div>
</body>
</html>