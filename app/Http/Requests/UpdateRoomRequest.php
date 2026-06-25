<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
        return [
            'room_name' =>'required',
            'description'=>'required',
            'price' =>'required',
            'room_type' =>'required',
            'wifi' =>'required',
            'image' =>'nullable|image|mimes:png,jpg,jpeg',
        ];
    }
}
