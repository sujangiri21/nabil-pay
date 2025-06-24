<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    public $status;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
        $this->status = strtolower($registration->payment_status);
    }

    public function build()
    {
        $subject = match ($this->status) {
            'approved' => 'Registration Successful - '.$this->registration->registration_number,
            'canceled' => 'Registration Cancelled - '.$this->registration->registration_number,
            'declined' => 'Registration Declined - '.$this->registration->registration_number,
            default => 'Registration Status - '.$this->registration->registration_number,
        };

        return $this->subject($subject)
            ->view('emails.registration_response');
    }
}
