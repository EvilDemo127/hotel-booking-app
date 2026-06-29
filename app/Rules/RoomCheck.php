<?php

namespace App\Rules;

use App\Models\Booking;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class RoomCheck implements ValidationRule
{
    protected $roomId;
    protected $checkIn;
    protected $checkOut;

    public function __construct($roomId,$checkIn,$checkOut)   
    {
        $this->roomId=$roomId;
        $this->checkIn=$checkIn;
        $this->checkOut=$checkOut;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isBooking =Booking::where('room_id',$this->roomId)
        ->where('arrive_date','<=',$this->checkIn)
        ->where('departure_date','>=',$this->checkOut)->exists();

        if($isBooking){
            $fail('The room is already booked for the selected dates.');
        }
    }
}
