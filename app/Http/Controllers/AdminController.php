<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bookings =Booking::all();
        return view('admin.index',['bookings'=>$bookings]);
    }
}
