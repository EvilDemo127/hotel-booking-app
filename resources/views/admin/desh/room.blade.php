
    <div class="border-b border-slate-700 ">
        <h1 class="p-2 text-xl font-bold uppercase text-gray-200 text-center border-b border-slate-700 pb-2"> Rooms</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-3">
            @foreach ($rooms as $room)
                <div class="rounded-xl border border-slate-700 bg-slate-900 shadow-lg overflow-hidden">
                    <div class="relative w-full h-30">
                        <img src="https://lh3.googleusercontent.com/d/{{$room->image }}" alt="" class="w-full h-60 sm:h-40">
                        <span class="absolute top-3 right-3 bg-blue-500 rounded-xl px-2 py-1 text-xs font-bold uppercase text-white">
                            {{ $room->room_type }}
                        </span>
                        <div class="flex flex-col gap-3 p-2">
                            <div class="flex justify-between p-3">
                                <h4 class="text-gray-200">Room No: {{$room->room_no}}</h4>
                                <span class="text-green-300">${{$room->price}}</span>
                            </div>
                            <p class="text-gray-200">{{Str::limit($room->description,35)}}</p>
                            @if (Request::is('/'))
                                <a href="{{route('booking',$room->id)}}" class="text-gray-300">see details</a>
                            @else
                                 <a href="{{route('detail_room',$room->id)}}" class="text-gray-300">see details</a>   
                            @endif
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    