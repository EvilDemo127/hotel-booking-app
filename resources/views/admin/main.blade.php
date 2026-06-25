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
        {{-- <ul>
            <a href="{{route('show_booking')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                </svg>
                <span class="hidden sm:inline ms-3 font-medium">Booking</span>
            </a>
        </ul> --}}
         <ul>
            <a href="{{route('booking_detail')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                </svg>
                <span class="hidden sm:inline  ms-3 font-medium">Booking</span>
            </a>
        </ul>
        <ul>
            
            <a href="" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 transition duration-200">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                    </svg>  
                        <span class="hidden sm:inline ms-3 font-medium">Gallery</span>
                    </a>
        </ul>
        <ul>
            
            <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left m-3">
                <button @click="open = !open" class="text-white inline-flex items-center gap-1">
                    <span>Room</span>
                    <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L4.16 9.28a.75.75 0 0 1 0-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" 
                    x-transition:enter="transition ease-out duration-100" 
                    style="display: none" 
                    class="absolute left-0 mt-2 w-48 rounded-md bg-slate-900 p-1 shadow-lg ring-1 ring-black ring-opacity-5 z-10">
                        
                    <a href="{{route('view_room')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 transition duration-200">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                    </svg>  
                        <span class="hidden sm:inline ms-3 font-medium">Rooms</span>
                    </a>
                    <a href="{{route('create_room')}}" class="flex items-center px-4 py-3 text-gray-200 rounded-lg hover:bg-slate-800 ">
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-white transition duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                        </svg>
                        <span class="hidden sm:inline ms-3 font-medium">Create Room</span>
                    </a>
                </div>
            </div>
        </ul>
         
        
      </div>
      <div class="flex flex-col min-w-0 md:col-span-10 gap-2">
            <div class="border border-slate-700 bg-slate-900 rounded-xl py-3 px-4 flex justify-between items-center w-full relative">
                
                @if (Request::is('detail_booking','search_booking'))
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

                
                <div class="flex items-center">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">Logout</button>
                    </form>
                </div>

            </div>

        @yield('content')
      </div>
  </div>
</body>
</html>
