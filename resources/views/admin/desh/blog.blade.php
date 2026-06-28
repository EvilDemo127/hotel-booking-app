@foreach ($blogs as $blog)
            <div class="m-2 border-b border-slate-700">
                <h1 class="p-3 text-xl uppercase text-gray-200 pb-2 text-center">Blog</h1>
                <div class="flex flex-col sm:flex-row w-full p-2 gap-2">
                    <img src="https://lh3.googleusercontent.com/d/{{ $blog->image }}" alt="" class="w-full sm:w-1/2 rounded-lg">
                    <p class="text-gray-200 w-full sm:w-1/2">{{$blog->body}}</p>
                </div>
            </div>
@endforeach