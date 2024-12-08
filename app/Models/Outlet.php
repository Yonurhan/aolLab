<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'outlet_name',
        'region',
        'opening_time',
        'closing_time',
        'date'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'outlet', 'outlet_name');
    }
}
