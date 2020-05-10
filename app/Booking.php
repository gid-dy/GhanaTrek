<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'UserEmail','SurName','OtherNames','UserEmail', 'Mobile', 'Address','City','State','ZipCode','Country','OtherContact','CouponCode','Amount','Status','Payment_method','Grand_total'
    ];

    public function bookings(){
        return $this->hasMany('App\BookingsPackage', 'Booking_id');
    }
    public static function getBookingDetails($Booking_id){
        $getBookingDetails = Booking::where('id', $Booking_id)->first();
        return $getBookingDetails;
    }
}
