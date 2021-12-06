<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class CalculateSent
 * @package App\Mail
 */
class CalculateSent extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * OrderServiceSent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return CalculateSent
     */
    public function build(): CalculateSent
    {
        return $this->subject('Форма: заказ 3 бесплатных вариантов просчёта')
            ->view('emails.calculate', [
                'data' => $this->data
            ]);
    }
}
