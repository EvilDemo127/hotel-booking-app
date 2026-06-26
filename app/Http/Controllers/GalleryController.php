<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function gallery()
    {
        $images = Gallery::all();
        return view('admin.gallery',['images'=>$images]);
    }

    public function upload_photo(GalleryRequest $request)
    {
        $gallery = $request->validated();
        $name = time(). '.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('gallerys',$name,'public');
        $gallery['image']='gallerys/'.$name;
        Gallery::create($gallery);
        return redirect()->back()->with('info','Success upload');
    }

    public function delete_photo($id)
    {
        $photo =Gallery::findOrFail($id);
        Storage::disk('public')->delete($photo->image);
        $photo->delete();
        return redirect()->back()->with('info','Deleting Success');
    }
}
