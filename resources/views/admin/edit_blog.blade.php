@extends('admin.main')
@section('content')
    <form action="{{route('update_blog',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-white">{{$error}}</p>
                @endforeach
            @endif
            @if (session('info'))
                <p class="text-white">{{session('info')}}</p>
            @endif
            @csrf
            <img src="https://lh3.googleusercontent.com/d/{{ $blog->image }}" alt="">
            <label class="p-3 uppercase text-gray-400 block mb-1">‌Add Photo </label>
            <input type="file"  class="w-full p-2 rounded-lg border border-slate-700 bg-slate-800 text-gray-300  file:rounded-md file:border-0  file:bg-slate-700 file:text-gray-200" name="image" >
            <textarea name="body" id="" cols="30" rows="10" class="w-full mt-3  bg-slate-800 text-gray-300">{{$blog->body}}</textarea>
            <button class="p-1.5 my-2 w-full bg-gray-500 rounded-lg text-gray-300 hover:bg-gray-300 hover:text-gray-700">Upload</button>
        </form>
@endsection

