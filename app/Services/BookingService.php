<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingService
{
  public function isCarBooked($requestData)
  {
    $start_date     = Carbon::parse($requestData['start_date']);
    $end_date       = Carbon::parse($requestData['end_date']);
    $bookings       = Booking::where('car_id', $requestData['car_id'])->get();

    do {
      if (
        $bookings->where('start_date', '<', $start_date)->where('end_date', '>', $start_date)->count() ||
        $bookings->where('start_date', '<', $end_date)->where('end_date', '>', $end_date)->count() ||
        $bookings->where('start_date', '<', $start_date)->where('end_date', '>', $end_date)->count()
      ) {
        return true;
      }
    } while ($end_date->lt($start_date));

    return false;
  }
}
