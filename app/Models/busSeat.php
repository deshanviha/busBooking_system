<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busSeat extends Model
{
    use HasFactory;
    protected $fillable=[
        'bus_id',
        'seat_number',
        'price'
    ];

}
