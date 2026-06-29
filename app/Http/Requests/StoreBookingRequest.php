<?php

namespace App\Http\Requests;

use App\Rules\RoomCheck;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $roomId =$this->route('id');
         $checkIn=$this->input('check_in');
         $checkOut=$this->input('check_out');

        return [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'check_in'=>['required','date','after_or_equal:today'],
            'check_out'=>['required','date','after:check_in',new RoomCheck($roomId, $checkIn, $checkOut)],
            
        ];
    }
}
