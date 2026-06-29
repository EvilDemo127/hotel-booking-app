<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'room_name',
        'email',
        'phone',
        'stauts',
        'check_in',
        'check_out'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class,'room_name');
    }
}
