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
<ul>
    <li><strong>Registration Number:</strong> {{ $registration->registration_number }}</li>
    <li><strong>Total Paid:</strong> Rs {{ number_format($registration->total_amount, 2) }}</li>
    <li><strong>Breakfast Option:</strong> {{ $registration->breakfast ? 'Yes' : 'No' }}</li>
    <li><strong>Hotel Booking:</strong> {{ $registration->hotel_booking_status }}</li>
</ul>
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
