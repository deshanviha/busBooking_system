<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busScheduleBooking extends Model
{
    use HasFactory;
    protected $fillable=[

        'bus_seat_id',
        'user_id',
        'bus_schedule_id',
        'seat_number',
        'price',
        'status'
    ];


}
