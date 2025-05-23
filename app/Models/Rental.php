<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function car() {
        return $this->belongsTo(Car::class);
    }
    protected $fillable = [
    'user_id',
    'car_id',
    'start_date',
    'end_date',
    'total_cost',
];

    
}
