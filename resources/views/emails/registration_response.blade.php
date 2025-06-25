@php
    $statusLabel = match ($status) {
        'approved' => 'Payment Successful',
        'canceled' => 'Registration Cancelled',
        'declined' => 'Payment Failed',
        default => 'Payment Faield',
    };
@endphp

<h2>{{ $statusLabel }}</h2>

<p>Dear {{ $registration->first_name }},</p>
<p>Thank you for completing your registration.</p>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <td><strong>Registration No:</strong></td>
        <td>{{ $registration->registration_number }}</td>
    </tr>
    <tr>
        <td><strong>Name:</strong></td>
        <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>{{ $registration->email }}</td>
    </tr>
    <tr>
        <td><strong>Visa Formalities:</strong></td>
        <td>{{ $registration->visa_formalities }}</td>
    </tr>
    <tr>
        <td><strong>Flight Arrival:</strong></td>
        <td>{{ $registration->flight_arrival_date }}</td>
    </tr>
    <tr>
        <td><strong>Flight Departure:</strong></td>
        <td>{{ $registration->flight_departure_date }}</td>
    </tr>
    <tr>
        <td><strong>Food Pref:</strong></td>
        <td>{{ $registration->food_preferences }}</td>
    </tr>
    <tr>
        <td><strong>Allergies:</strong></td>
        <td>{{ $registration->food_allergies }}</td>
    </tr>
    <tr>
        <td><strong>T-Shirt:</strong></td>
        <td>{{ $registration->tshirt_size }}</td>
    </tr>
    <tr>
        <td><strong>Jacket:</strong></td>
        <td>{{ $registration->jacket_size }}</td>
    </tr>
    <tr>
        <td><strong>Dress:</strong></td>
        <td>{{ $registration->cultural_dress_size }}</td>
    </tr>
    <tr>
        <td><strong>Breakfast:</strong></td>
        <td>{{ $registration->breakfast ? 'Yes' : 'No' }}</td>
    </tr>
    <tr>
        <td><strong>Total:</strong></td>
        <td>Rs {{ number_format($registration->total_amount, 2) }}</td>
    </tr>
    <tr>
        <td><strong>Payment Status:</strong></td>
        <td>{{ $registration->payment_status }}</td>
    </tr>
</table>

<h3>Companions:</h3>
@foreach ($registration->companions as $companion)
    <p>
        <strong>{{ $loop->iteration }}. {{ $companion->first_name }} {{ $companion->last_name }}</strong><br>
        Food: {{ $companion->food_preferences }} <br>
        Allergies: {{ $companion->food_allergies }} <br>
        Hotel: {{ $companion->hotel_booking_status }} <br>
        Sizes: T-Shirt {{ $companion->tshirt_size }}, Jacket {{ $companion->jacket_size }}, Dress
        {{ $companion->cultural_dress_size }}<br>
        Breakfast: {{ $companion->breakfast ? 'Yes' : 'No' }}<br>
        Weight: {{ $companion->weight_kg }} kg
    </p>
@endforeach

@if ($status === 'approved')
    <p>We look forward to seeing you!</p>
@elseif($status === 'canceled')
    <p>You have cancelled the payment process.
        {{-- Your registration is not finalized. If this was a mistake, you may try --}}
        {{--     registering again. --}}
    </p>
@else
    <p>Your payment could not be processed. Please try again later or contact support.</p>
@endif
