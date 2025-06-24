<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust based on your authorization logic (e.g., auth()->check())
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // this was for ajax
            // 'registration.first_name' => ['required', 'string', 'max:255'],
            // 'registration.last_name' => ['required', 'string', 'max:255'],
            // 'registration.email' => ['nullable', 'email', 'max:255'],
            // 'registration.visa_formalities' => ['required', 'string', 'in:Arranged,In Progress,Not Started'],
            // 'registration.flight_arrival_date' => ['nullable', 'date'],
            // 'registration.flight_departure_date' => ['nullable', 'date', 'after_or_equal:registration.flight_arrival_date'],
            // 'registration.flight_airline' => ['nullable', 'string', 'max:255'],
            // 'registration.flight_number' => ['nullable', 'string', 'max:255'],
            // 'registration.food_preferences' => ['required', 'string', 'in:Vegetarian,Non-Vegetarian,Vegan'],
            // 'registration.food_allergies' => ['nullable', 'string'],
            // 'registration.hotel_booking_status' => ['nullable', 'string', 'in:Booked,Not Booked,Pending'],
            // 'registration.tshirt_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            // 'registration.jacket_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            // 'registration.cultural_dress_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            // 'registration.weight_kg' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            // 'registration.breakfast' => ['required', 'in:1,0'],

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'visa_formalities' => ['required', 'string', 'in:Arranged,In Progress,Not Started'],
            'flight_arrival_date' => ['nullable', 'date'],
            'flight_departure_date' => ['nullable', 'date', 'after_or_equal:registration.flight_arrival_date'],
            'flight_airline' => ['nullable', 'string', 'max:255'],
            'flight_number' => ['nullable', 'string', 'max:255'],
            'food_preferences' => ['required', 'string', 'in:Vegetarian,Non-Vegetarian,Vegan'],
            'food_allergies' => ['nullable', 'string'],
            'hotel_booking_status' => ['nullable', 'string', 'in:Booked,Not Booked,Pending'],
            'tshirt_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'jacket_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'cultural_dress_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'weight_kg' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'breakfast' => ['required', 'in:1,0'],

            'companions' => ['sometimes', 'array', 'max:10'],
            'companions.*.first_name' => ['required', 'string', 'max:255'],
            'companions.*.last_name' => ['required', 'string', 'max:255'],
            'companions.*.food_preferences' => ['required', 'string', 'in:Vegetarian,Non-Vegetarian,Vegan'],
            'companions.*.food_allergies' => ['nullable', 'string'],
            'companions.*.hotel_booking_status' => ['nullable', 'string', 'in:Booked,Not Booked,Pending'],
            'companions.*.tshirt_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'companions.*.jacket_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'companions.*.cultural_dress_size' => ['nullable', 'string', 'in:S,M,L,XL,XXL'],
            'companions.*.weight_kg' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'companions.*.breakfast' => ['required', 'in:1,0'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Normalize empty strings to null for nullable fields
        $registration = $this->input('registration', []);
        foreach (['email', 'flight_arrival_date', 'flight_departure_date', 'flight_airline', 'flight_number',
                  'food_allergies', 'hotel_booking_status', 'tshirt_size', 'jacket_size',
                  'cultural_dress_size', 'weight_kg'] as $key) {
            if (empty($registration[$key])) {
                $registration[$key] = null;
            }
        }
        $this->merge(['registration' => $registration]);

        $companions = $this->input('companions', []);
        foreach ($companions as &$companion) {
            foreach (['food_allergies', 'hotel_booking_status', 'tshirt_size', 'jacket_size',
                      'cultural_dress_size', 'weight_kg'] as $key) {
                if (empty($companion[$key])) {
                    $companion[$key] = null;
                }
            }
        }
        $this->merge(['companions' => $companions]);
    }

    protected function failedValidation(Validator $validator)
    {
        dd($validator->errors()->first());

        return parent::failedValidation($validator);
    }
}
