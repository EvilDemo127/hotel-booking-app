<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->check() && auth()->user()->role == 'admin')
            {
                $bookings =Booking::all();
                return view('admin.index',['bookings'=>$bookings]);
            }else{
                return view('home.index');
            }
    }
}
