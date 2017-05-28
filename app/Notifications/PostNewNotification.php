<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostNewNotification extends Notification
{
    use Queueable;
    // use Auth;
    protected $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

/*public function toDatabase(){
    return[

    ];
}*/
   
    public function toArray($notifiable)
    {
        return [
            'data'=> 'Transaksi baru: Oleh'.auth()->user()->name
        ];
    }
}
