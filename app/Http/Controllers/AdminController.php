<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive;

class AdminController extends Controller
{

    public function index()
    {
        $bookings =Booking::all();
        $rooms =Room::all();
        $images = Gallery::all();
        $blogs =Blog::all();
        return view('admin.index',['bookings'=>$bookings,'rooms'=>$rooms,'images'=>$images,'blogs'=>$blogs]);
    }

    public function home()
    {
        $bookings =Booking::all();
        $rooms =Room::all();
        $images = Gallery::all();
        $blogs =Blog::all();
        return view('home.index',['bookings'=>$bookings,'rooms'=>$rooms,'images'=>$images,'blogs'=>$blogs]);
    }

    
}
