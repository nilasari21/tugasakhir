<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResellerTolak extends Notification
{
    use Queueable;

    protected $keranjang;
    public function __construct($keranjang)
    {
        $this->keranjang=$keranjang;
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Mohon maaf transaksi anda ditolak oleh admin, karena jumlah pembelian kurang dari minimal pembelian oleh reseller')
                    // ->action('Notification Action', url('/'))
                    ->line('Silahkan periksa keranjang anda, transaksi kami kembalikan ke keranjang. Lengkapi jumlah pembelian sesuai ketentuan minimal pembelian yang berlaku');
    }

   
   /* public function toArray($notifiable)
    {
        return [
           
        ];
    }*/
}
