<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'id';

    // Booking model belongs to a car
    public function booking()
    {
        return $this->belongsTo(Car::class);
    }
}
