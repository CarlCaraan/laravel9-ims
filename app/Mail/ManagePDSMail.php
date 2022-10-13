<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManagePDSMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('admin.pds.pds_email_template')
            ->subject('Scanned PDS Status Update | Laguna School Division Office')
            ->from('laguna@deped.gov.ph', 'Laguna School Division Office')
            ->with('data', $this->data);
    }
}
