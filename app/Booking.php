<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function bookings(){
        return $this->hasMany('App\BookingsPackage', 'Booking_id');
    }
}
