@extends('admin.main')
@section('content')
    <div class="rounded-xl border border-slate-700 ">
        <h1 class="p-2 text-xl font-bold uppercase text-gray-200 border-b border-slate-700 pb-2">Create New Room</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
        <form action="{{route('store_room')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="flex flex-col gap-4 p-5">
                <div class="">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Room Name</label>
                    <input type="text" class="w-full p-3 rounded-lg bg-slate-700 text-gray-200 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="room_name" value="{{old('room_name')}}">
                </div>

                <div class="">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Description</label>
                    <textarea type="email"  class="w-full p-3 rounded-lg  bg-slate-700 text-gray-200 border border-slate-700 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="description"> {{old('description')}}</textarea>
                </div>
                    <div class="">
                        <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Price</label>
                        
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-gray-200 font-medium">$</span>
                            
                            <input type="number" step="0.01" class="w-full p-3 pl-7 rounded-lg bg-slate-700 border border-slate-700 text-gray-200 autofill:shadow-[inset_0_0_0_1000px_theme(colors.slate.700)] autofill:[-webkit-text-fill-color:theme(colors.gray.200)]" name="price" value="{{ old('price') }}" required>
                        </div>
                    </div>

                <div class="">
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

                <div class="">
                    <label class="text-xs font-semibold tracking-wide uppercase text-gray-400 block mb-1">Image</label>
                    <input type="file"  class="w-full p-2 rounded-lg border border-slate-700 bg-slate-800 text-gray-300  file:rounded-md file:border-0  file:bg-slate-700 file:text-gray-200" name="image" >
                </div>
                <button class="w-full md:w-1/2 text-xl text-gray-100 bg-slate-400 py-2 border border-slate-700 rounded-lg hover:bg-slate-100 hover:text-gray-600">Save</button>
            </div>
        </form>
    </div>
    
@endsection