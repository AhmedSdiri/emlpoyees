<?php

namespace App\Mail;
use App\Devis;
use App\Accounting;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mymail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($devi)
    {
     
        $this->mydevi = $devi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
          //dd($this->mydevi);   
          // $this->mydevi = $aux;
        
           $accountings= Accounting::all();
           return $this->from('monsite@chezmoi.com')
                    ->view('emails-mgmt.email',['devi'=>$this->mydevi,'accountings'=>$accountings]);
    }
}
