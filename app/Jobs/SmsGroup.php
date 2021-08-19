<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Sms\SmsIR_SendMessage;

class SmsGroup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mobile;
    protected $dataSms;
    protected $scheduling;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mobile, $dataSms, $scheduling = '')
    {
        $this->mobile = $mobile;
        $this->dataSms = $dataSms;
        $this->scheduling = $scheduling;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        date_default_timezone_set("Asia/Tehran");
        // your sms.ir panel configuration
        $APIKey = "96d8367c3be894fbafde367f";
        $SecretKey = "Abcd/1234Abcd!1234";
        $APIURL = "https://ws.sms.ir/";

        // message data
        $data = array(
            'Messages' => (array)$this->dataSms,
            'MobileNumbers' => (array)$this->mobile,
            'LineNumber' => "50002015992573",
            'SendDateTime' => $this->scheduling,
            'CanContinueInCaseOfError' => 'false'
        );

        $SmsIR_SendMessage = new SmsIR_SendMessage($APIKey, $SecretKey, $APIURL);
        $SmsIR_SendMessage = $SmsIR_SendMessage->sendMessage($data);
        //var_dump($SmsIR_SendMessage);

    }
}
