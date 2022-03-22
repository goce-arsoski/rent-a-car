<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['brand', 'model', 'plate', 'color'];

    protected $hidden = ['updated_at'];

    protected $visible = ['brand', 'model', 'plate', 'color'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
