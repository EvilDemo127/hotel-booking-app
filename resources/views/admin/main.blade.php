<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
 {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>  --}}
<body class="bg-gray-800 gap-3">
    
  <div class="flex flex-row md:grid md:grid-cols-12 min-h-screen bg-slate-950 overflow-hidden gap-2">
      <div class="md:col-span-2 bg-slate-900 p-2 sm:p-4 rounded-2xl shadow-xl border border-slate-800">
        <ul>
            <a href="{{route('home')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21.75h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21.75h8.25" />
                </svg>
                <span class="hidden sm:inline ms-3 font-medium">Main Page</span>
            </a>
        </ul>
         <ul>
            <a href="{{route('booking_detail')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                <span class="hidden sm:inline  ms-3 font-medium">Booking</span>
            </a>
        </ul>
        <ul>
            
            <a href="{{route('gallery')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 transition duration-200">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                        <span class="hidden sm:inline ms-3 font-medium">Gallery</span>
                    </a>
        </ul>
        <ul>
            
            <a href="{{route('blog')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 transition duration-200">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                        <span class="hidden sm:inline ms-3 font-medium">BLOG</span>
                    </a>
        </ul>
        <ul>
            
            <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left m-3">
                <button @click="open = !open" class="text-white inline-flex items-center gap-1">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5h-1.875a6 6 0 0 0-11.25 0H6M21 7.5v12.25A1.25 1.25 0 0 1 19.75 21H18M21 7.5A2.25 2.25 0 0 0 18.75 5.25H16.5M3 7.5H4.875a6 6 0 0 1 11.25 0H18M3 7.5v12.25A1.25 1.25 0 0 0 4.25 21H6M3 7.5A2.25 2.25 0 0 1 5.25 5.25H7.5m10.5 15.75V12.75a1.5 1.5 0 0 0-1.5-1.5H7.5a1.5 1.5 0 0 0-1.5 1.5v8.25m12 0h-12" />
                    </svg>

                    <span>Room</span>

                </button>

                <div x-show="open" 
                    x-transition:enter="transition ease-out duration-100" 
                    style="display: none" 
                    class="absolute left-0 mt-2 w-48 rounded-md bg-slate-900 p-1 shadow-lg ring-1 ring-black ring-opacity-5 z-10">
                        
                    <a href="{{route('view_room')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 transition duration-200">
                    <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 9.75h9" />
                    </svg>
                        <span class="hidden sm:inline ms-3 font-medium">Rooms</span>
                    </a>
                    <a href="{{route('create_room')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                        <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5H18M3 7.5h4.5M21 7.5v12.25A1.25 1.25 0 0 1 19.75 21H4.25A1.25 1.25 0 0 1 3 19.75V7.5M16.5 21V12.75a1.5 1.5 0 0 0-1.5-1.5H9a1.5 1.5 0 0 0-1.5 1.5V21" />
                        </svg>
                        <span class="hidden sm:inline ms-3 font-medium">Create Room</span>
                    </a>
                </div>
            </div>
        </ul>
         
        
      </div>
      <div class="flex flex-col min-w-0 md:col-span-10 gap-2">
            <div class="border border-slate-700 bg-slate-900 rounded-xl py-3 px-4 flex justify-between items-center w-full relative">
                
                @if (Request::is('booking_detail','search_booking','admin'))
                    <form action="" method="post">
                        @csrf
                        <div class="relative text-white ">
                            <button class="absolute inset-y-0 left-0 flex items-center pl-3 ">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://w3.org" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                            <input type="search" name="search" placeholder="Search booking..." class="w-full pl-10 rounded-lg border border-slate-700 bg-slate-950 text-gray-200 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]">
                        </div>    
                    </form>        
            
                @else
                    
                    <div></div> 
                @endif

                
                <div class="flex items-center  space-x-6">
                    <a href="{{route('profile.edit')}}" class="text-gray-200">{{Auth::user()->name}}</a>
                    <div>
                        <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">Logout</button>
                    </form>
                    </div>
                </div>

            </div>

        @yield('content')
      </div>
  </div>
</body>
</html>
