<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-400">

    <nav>
        <div class="flex justify-between p-5 bg-gray-500">
            <a href="">
                <img src="https://images.trvl-media.com/lodging/84000000/83530000/83526600/83526593/80723385.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill" alt="" class="w-10 h-5 border rounded-full">
                <span class="sr-only">HOTEL </span>
            </a>
            <div class="uppercase">
                <a href="" class="px-4 py-2 text-white rounded-lg hover:bg-gray-600">home</a>
                <a href="" class="px-4 py-2 text-white rounded-lg hover:bg-gray-600">about</a>
                <a href="" class="px-4 py-2 text-white rounded-lg hover:bg-gray-600">contact us</a>
                <a href="" class="px-4 py-2 text-white rounded-lg hover:bg-gray-600">Booking</a>
                <a href="" class="px-4 py-2 text-white rounded-lg hover:bg-gray-600">Something</a>
            </div>
            <div class="uppercase flex gap-3">
                @if (!auth()->user())
                    <a href="{{route('login')}}">login</a>
                <a href="{{route('login')}}">register</a>
                @else
                <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">Logout</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>