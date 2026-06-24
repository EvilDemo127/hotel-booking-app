<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store_booking(StoreBookingRequest $request)
    {
        $valiDate =$request->validated();
        Booking::create($valiDate);
        return redirect()->back()->with('info','Booking Success');
    }

    public function booking_detail()
    {
        $bookings =Booking::all();
        return view('admin.update_booking',['bookings'=>$bookings]);
    }
}

