<?php

namespace App\Mail;

use App\Models\Vouchers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    public $voucherUser;

    public function __construct(Vouchers $voucherUser)
    {
        $this->voucherUser = $voucherUser;
    }

    public function build()
    {

        $this->subject('Seu Aniversário Feliz');
        $this->to($this->voucherUser->email, $this->voucherUser->name);
        return $this->view('mail.voucherMail', ['voucherUser' => $this->voucherUser]);
    }
}
