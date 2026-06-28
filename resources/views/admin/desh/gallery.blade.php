
    <div class="border-b border-slate-700">
        <h1 class="p-3 text-xl uppercase text-gray-200 pb-2 text-center">Gallery</h1>


        <div class="grid grid-cols-3 gap-3 p-1">
            @foreach ($images as $image)
                <div class="rounded-xl overflow-hidden w-full">
                    <img src="https://lh3.google.com/d/{{$image->image}}" alt="" class="w-full h-40 sm:h-48">
                
                </div>
            @endforeach
        </div>
    </div>