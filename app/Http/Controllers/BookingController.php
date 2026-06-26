<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Room;
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

    public function update_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = request()->status;
            if(request()->status == 'delete')
                {
                    $booking->delete();
                    return redirect()->back()->with('info','delete success');
                }
        $booking->save();
        return redirect()->back()->with('info','updating success');
    }

    public function booking($id)
    {
        $room = Room::find($id);
        return view('home.booking',['room'=>$room]);
    }
}

