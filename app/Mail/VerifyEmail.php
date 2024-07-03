<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.verify-email')
                    ->subject('Confirmación de Registro')
                    ->with([
                        'userName' => $this->user->name,
                        // Otros datos que desees pasar a la vista del correo
                    ]);
    }
}
