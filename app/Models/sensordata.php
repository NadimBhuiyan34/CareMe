<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensordata extends Model
{
    use HasFactory;
    protected $table = 'sensordatas';
    protected $fillable = ['room_temperature', 'humidity','body_temperature', 'heart_rate'];
}
