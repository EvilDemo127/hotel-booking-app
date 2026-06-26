@extends('home.home')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 p-6 rounded-2xl">

    <div class="relative md:col-span-5 rounded-xl shadow-lg border border-slate-700 bg-gray-600 ">
            <img src="{{asset('storage/'.$room->image)}}" 
             class="w-100 h-100 rounded-lg shadow-lg">
             <span class="absolute top-3 right-3 bg-blue-500 rounded-xl px-2 py-1 text-xs font-bold uppercase text-white">{{$room->room_type}}</span>
             <div class="flex flex-col gap-3">
                <div class="flex justify-between p-3">
                    <h4 class="text-gray-200">Room No: {{$room->room_no}}</h4>
                    <span class="text-green-300">${{$room->price}}</span>
                </div>
                    <p class="text-gray-200 p-2">{{$room->description}}</p>
            </div>
    </div>
    
    <div class="md:col-span-7 p-4 flex flex-col gap-4">
        
        <h2 class="text-xl font-bold uppercase tracking-wider border-b border-slate-700 pb-2">Reservation</h2>
        <form action="{{route('store_booking')}}" method="POST">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <ul class="text-red-600">{{$error}}</ul>
                @endforeach
            @endif
            @if (session('info'))
                    <ul class="text-green-600">{{session('info')}}</ul>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Full Name</label>
                    <input type="text" placeholder="John Doe" class="w-full p-3 rounded-lg  bg-slate-400 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.400)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="name" value="{{old('name')}}">
                </div>

                <div>
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Email Address</label>
                    <input type="email" placeholder="john@example.com" class="w-full p-3 rounded-lg  bg-slate-400 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.400)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="email" value="{{old('email')}}">
                </div>

                <div>
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Phone Number</label>
                    <input type="text" placeholder="+66 81 234 5678" class="w-full p-3 rounded-lg   bg-slate-400 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.400)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="phone" value="{{old('phone')}}">
                </div>

                <div>
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Check-In Date</label>
                    <input type="date" class="w-full p-3 rounded-lg  bg-slate-400 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.400)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="check_in">
                </div>

                <div>
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Check-Out Date</label>
                    <input type="date" class="w-full p-3 rounded-lg  bg-slate-400 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.400)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="check_out">
                </div>

            </div>

            <button class="w-full bg-slate-400 hover:bg-gray-500 text-slate-900 font-bold py-3 rounded-xl  mt-4 shadow-md">
                Confirm Booking
            </button>
        </form>
    </div>
</div>

@endsection