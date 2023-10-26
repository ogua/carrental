<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->hasMany(Tripreview::class,'car_id');
    }
}
