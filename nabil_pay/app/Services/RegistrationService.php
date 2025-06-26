<?php

namespace App\Services;

use App\Models\Registration;

class RegistrationService
{
    public static function _getRegistrationFromOrder(string $orderId)
    {
        return Registration::query()->where('order_id', $orderId)->firstOrFail();
    }
}
