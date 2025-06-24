<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'visa_formalities',
        'flight_arrival_date',
        'flight_departure_date',
        'flight_airline',
        'flight_number',
        'food_preferences',
        'food_allergies',
        'hotel_booking_status',
        'tshirt_size',
        'jacket_size',
        'cultural_dress_size',
        'weight_kg',
        'applicant_breakfast',

        'breakfast',
        'total_amount',

        'payment_status',
    ];

    public function companions()
    {
        return $this->hasMany(Companion::class);
    }

}
