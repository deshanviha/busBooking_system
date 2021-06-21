<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busRoutes extends Model
{
    use HasFactory;
    protected $fillable=[
'bus_id',
'route_id',
'status'

];
}
