@extends('admin.main')
@section('content')
    <div class="rounded-xl border border-slate-700 ">
        <h1 class="p-2 text-xl font-bold uppercase text-gray-200 text-center border-b border-slate-700 pb-2"> Rooms</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
        <div class="flex flex-col p-5 items-center">
            <form action="{{route('update_room',$room->id)}}" class="p-3" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <img src="{{ asset('storage/' . $room->image) }}" alt="">
                    
                </div>
                <div class=" mt-3">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Image</label>
                    <input type="file"  class="w-full p-2 rounded-lg border border-slate-700 bg-slate-800 text-gray-300  file:rounded-md file:border-0  file:bg-slate-700 file:text-gray-200" name="image" >
                </div>

                <div class=" mt-3">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Room No</label>
                    <input type="text" name="room_name" value="{{old('room_no',$room->room_name) }}" class="w-full rounded-lg border border-slate-700 bg-slate-700 text-gray-300 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]">
                </div>

                 <div class=" mt-3">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Description</label>
                    <textarea type="text" name="description" class="w-full rounded-lg border border-slate-700 bg-slate-700 text-gray-300 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]">{{old('description',$room->description) }}</textarea>
                </div>

                <div class=" mt-3">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Price</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-200 font-medium">$</span>
                        <input type="number" step="0.01" class="w-full p-3 pl-7 rounded-lg bg-slate-700 border border-slate-700 text-gray-200 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="price" value="{{ old('price',$room->price) }}" required>
                    </div>
                </div>
                <div class=" mt-3">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Room Type</label>
                    <select name="room_type" id="" class="w-full p-3 rounded-lg border border-slate-700 bg-slate-700 text-gray-300">
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="deluxe">Deluxe </option>
                    </select>
                </div>

                <div class="">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Wifi</label>
                    <select name="wifi" id="" class="w-full p-3 rounded-lg border border-slate-700 bg-slate-700 text-gray-200">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <button class="w-full mt-4 text-xl text-gray-100 bg-slate-400 py-2 border border-slate-700 rounded-lg hover:bg-slate-100 hover:text-gray-600">Update</button>
            </form>
        </div>
    </div>
    
@endsection