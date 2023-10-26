<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class,'car_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class,'driver_id');
    }

    public function payed()
    {
        return $this->hasOne(Paystack::class,'uniqueid','uniqueid');
    }
}
