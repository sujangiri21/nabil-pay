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
        $config = config('custom.campaign');
        $ratePerPerson = $config['rate_per_person'];
        $breakfastRate = $config['breakfast_rate_per_person'];

        try {
            $registration = DB::transaction(function () use ($request, $ratePerPerson, $breakfastRate) {
                $registrationData = $request->input('registration');
                $companionsData = $request->input('companions', []);
                $registrationData['total_amount'] = $ratePerPerson;
                if( $registrationData['breakfast']) {
                    $registrationData['total_amount'] += $breakfastRate;
                }


                $companionsInput = [];
                if (! empty($companionsData)) {
                    foreach ($companionsData as $companionData) {
                        $companionData['total_amount'] = $ratePerPerson;
                        if( $companionData['breakfast']) {
                            $companionData['total_amount'] += $breakfastRate;
                        }
                        $registrationData['total_amount'] += $companionData['total_amount'];
                        $companionInput[] = $companionData;
                    }
                }

                $registration = Registration::create($registrationData);

                $registration->companions()->createMany($companionInput);

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
