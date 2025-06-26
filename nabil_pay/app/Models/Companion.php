<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'food_preferences',
        'food_allergies',
        'hotel_booking_status',
        'tshirt_size',
        'jacket_size',
        'cultural_dress_size',
        'weight_kg',

        'breakfast',
        'total_amount',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
