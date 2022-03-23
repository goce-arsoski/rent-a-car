<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'id';

    protected $fillable = ['car_id', 'start_date', 'end_date'];

    // Booking model belongs to a car
    public function booking()
    {
        return $this->belongsTo(Car::class);
    }
}
