<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function create()
    {
        $config = config('custom.campaign');
        $ratePerPerson = $config['rate_per_person'];
        $breakfastRate = $config['breakfast_rate_per_person'];

        return view('nabil-pay.index', compact('ratePerPerson', 'breakfastRate'));

    }

    /**
     * Store a new registration and its companions.
     */
    public function store(StoreRegistrationRequest $request)
    {
        try {
            $registration = DB::transaction(function () use ($request) {
                $registrationData = $request->input('registration');
                $registration = Registration::create($registrationData);

                $companionsData = $request->input('companions', []);
                if (! empty($companionsData)) {
                    foreach ($companionsData as $companionData) {
                        $registration->companions()->create($companionData);
                    }
                }

                return $registration;
            });

            return response()->json([
                'success' => true,
                'message' => 'Registration completed successfully',
                'data' => [
                    'registration_id' => $registration->id,
                    'companion_count' => $registration->companions->count(),
                ],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to complete registration: '.$e->getMessage(),
            ], 422);
        }
    }
}
