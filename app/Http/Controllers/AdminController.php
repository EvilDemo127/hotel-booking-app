<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bookings =Booking::all();
        $rooms =Room::all();
        $images = Gallery::all();
        return view('admin.index',['bookings'=>$bookings,'rooms'=>$rooms,'images'=>$images]);
    }

    public function home()
    {
        $bookings =Booking::all();
        $rooms =Room::all();
        $images = Gallery::all();
        return view('home.index',['bookings'=>$bookings,'rooms'=>$rooms,'images'=>$images]);
    }
}
