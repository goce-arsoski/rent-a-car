<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'brand', 'model', 'plate', 'color'];

    protected $hidden = ['updated_at'];

    protected $visible = ['brand', 'model', 'plate', 'color'];

    public function carBookings()
    {
        return $this->hasMany(Booking::class);
    }

    //Get all cars for the User
    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, User::class);
    }
}
