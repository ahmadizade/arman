<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    protected $view;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
//    public function __construct($view, $email)    // agar khastim view ham taghir dahim.
    public function __construct($email)
    {
//        $this->view = $view;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->email;
        Mail::to($email)->send(new \App\Mail\Bazarti());
    }
}
