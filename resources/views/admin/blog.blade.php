@extends('admin.main')

@section('content')
    
<div class="rounded-xl border border-slate-700 p-3">
        <h1 class="p-2 text-xl font-bold uppercase text-gray-200 border-b border-slate-700 pb-2">Create Blog</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
        <form action="{{route('create_blog')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="p-3 uppercase text-gray-400 block mb-1">‌Add Photo </label>
            <input type="file"  class="w-full p-2 rounded-lg border border-slate-700 bg-slate-800 text-gray-300  file:rounded-md file:border-0  file:bg-slate-700 file:text-gray-200" name="image" >
            <textarea name="body" id="" cols="30" rows="10" class="w-full mt-3  bg-slate-800 text-gray-300"></textarea>
            <button class="p-1.5 my-2 w-full bg-gray-500 rounded-lg text-gray-300 hover:bg-gray-300 hover:text-gray-700">Upload</button>
        </form>
        @foreach ($blogs as $blog)
            <div class="border rounded-lg m-2">
                <div class="flex flex-col sm:flex-row w-full p-2 gap-2">
                    <img src="https://lh3.googleusercontent.com/d/{{ $blog->image }}" alt="" class="w-full sm:w-1/2 rounded-lg">
                    <p class="text-gray-200 w-full sm:w-1/2">{{$blog->body}}</p>
                </div>

                <div class="flex justify-center gap-5 m-3">
                    <a href="{{route('edit_blog',$blog->id)}}" class="px-6 py-1 rounded-lg bg-slate-50 hover:bg-green-300">Edit</a>
                    <form action="{{route('delete_blog',$blog->id)}}" method="POST">
                        @csrf
                        <button class="px-4 py-1 rounded-lg text-red-500 bg-slate-50 hover:bg-red-300">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        
</div>
@endsection