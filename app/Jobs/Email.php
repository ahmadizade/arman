<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $view;
    protected $content;
    protected $title;
    protected $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$view,$content,$title,$subject)
    {
        $this->email = $email;
        $this->view = $view;
        $this->content = $content;
        $this->title = $title;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $result = [
            "email" => $this->email,
            "content" => $this->content,
            'title' => $this->title,
            'subject' => $this->subject
        ];

        Mail::send('emails.'.$this->view, ["result" => $result], function ($message) use ($result) {
            $message->from('hr.ahmadi@setarehvanak.com', $this->title);
            $message->to($result['email'])->subject($this->subject);
        });

    }
}
