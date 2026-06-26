@extends('admin.main')
@section('content')
    
    <div class="rounded-xl border border-slate-700 ">
        <h1 class="p-3 text-xl uppercase text-gray-200 border-b border-slate-700 pb-2 text-center">Gallery</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
        <form action="{{route('upload_photo')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4 w-full sm:w-1/2">
                <label class="p-3 uppercase text-gray-400 block mb-1">‌Add Photo </label>
                <input type="file"  class="w-full p-2 rounded-lg border border-slate-700 bg-slate-800 text-gray-300  file:rounded-md file:border-0  file:bg-slate-700 file:text-gray-200" name="image" >
                <button class="p-1.5 my-2 w-full bg-gray-500 rounded-lg text-gray-300 hover:bg-gray-300 hover:text-gray-700">Upload</button>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-3 p-1">
            @foreach ($images as $image)
                <div class="rounded-xl overflow-hidden">
                    <img src="{{asset('storage/'.$image->image)}}" alt="" class="w-full h-40 sm:h-48">
                    <form action="{{route('delete_photo',$image->id)}}" method="POST">
                        @csrf
                        <button class="p-1.5 my-2 w-full rounded-lg text-red-300 hover:bg-red-300 hover:text-gray-700">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection