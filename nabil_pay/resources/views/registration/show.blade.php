@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @php
            $status = strtolower($registration->payment_status);
            $icon = 'ℹ️';

            $alertClass = match ($status) {
                'approved' => 'alert-success',
                'canceled' => 'alert-warning',
                'declined' => 'alert-danger',
                default => 'alert-secondary',
            };
        @endphp

        <div class="alert {{ $alertClass }} text-center">
            <h3>{{ $icon }} Payment {{ ucfirst($status) }}</h3> <!-- The Payment status can be among ['approved', 'canceled', 'declined', 'other'] -->
            <p><strong>{{ $registration->registration_number }}</strong></p>
        </div>

        <h4 class="mb-3">Registration Details</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $registration->email }}</td>
                </tr>
                <tr>
                    <th>Visa Formalities</th>
                    <td>{{ $registration->visa_formalities }}</td>
                </tr>
                <tr>
                    <th>Flight Arrival</th>
                    <td>{{ $registration->flight_arrival_date }}</td>
                </tr>
                <tr>
                    <th>Flight Departure</th>
                    <td>{{ $registration->flight_departure_date }}</td>
                </tr>
                <tr>
                    <th>Food Preferences</th>
                    <td>{{ $registration->food_preferences }}</td>
                </tr>
                <tr>
                    <th>Hotel Booking</th>
                    <td>{{ $registration->hotel_booking_status }}</td>
                </tr>
                <tr>
                    <th>T-Shirt Size</th>
                    <td>{{ $registration->tshirt_size }}</td>
                </tr>
                <tr>
                    <th>Jacket Size</th>
                    <td>{{ $registration->jacket_size }}</td>
                </tr>
                <tr>
                    <th>Cultural Dress Size</th>
                    <td>{{ $registration->cultural_dress_size }}</td>
                </tr>
                <tr>
                    <th>Breakfast</th>
                    <td>{{ $registration->breakfast ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>Rs {{ number_format($registration->total_amount, 2) }}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>{{ ucfirst($status) }}</td>
                </tr>
            </tbody>
        </table>

        @if ($registration->companions->count())
            <h4 class="mt-4">Companions</h4>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Food</th>
                        <th>Hotel</th>
                        <th>Sizes</th>
                        <th>Breakfast</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registration->companions as $companion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $companion->first_name }} {{ $companion->last_name }}</td>
                            <td>{{ $companion->food_preferences }}</td>
                            <td>{{ $companion->hotel_booking_status }}</td>
                            <td>
                                T: {{ $companion->tshirt_size }},
                                J: {{ $companion->jacket_size }},
                                D: {{ $companion->cultural_dress_size }}
                            </td>
                            <td>{{ $companion->breakfast ? 'Yes' : 'No' }}</td>
                            <td>{{ $companion->weight_kg }} kg</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Homepage</a>
        </div>
    </div>
@endsection
