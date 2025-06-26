<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Registration extends Model
{
    protected $fillable = [
        'registration_number',

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
        'order_id',
        'session_id',
        'payment_reference',

    ];

    public function companions()
    {
        return $this->hasMany(Companion::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $reg) {
            $reg->uuid = Str::uuid();
            $datePrefix = now()->format('Ymd');
            $countToday = Registration::whereDate('created_at', now()->toDateString())->count();
            $regNum = 'REG-'.$datePrefix.'-'.str_pad($countToday, 4, '0', STR_PAD_LEFT);
            $reg->registration_number = $regNum;
        });
    }
}
